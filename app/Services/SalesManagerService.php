<?php

namespace App\Services;

use App\Models\Enums\Payments;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Services\Traits\ValidateValue;
use Illuminate\Support\Collection;

class SalesManagerService
{

    use ValidateValue;

    const DEFAULT_PAYMENT = Payments::CASH;

    public function create(array $data): Sale
    {
        $details = $this->collectSaleDetails($data['details']);

        $sale = Sale::create([
            'store_id' => 1, // TODO change to auth store
            'staff_id' => $data['staff_id'],
            'payment' => $data['payment'] ?? self::DEFAULT_PAYMENT->value,
            'reference' => $this->generateReference(),
        ]);

        $sale->details()->saveMany($details);

        return $sale;
    }

    private function generateReference()
    {
        $terminal = 'T'; // TODO change to config terminal
        $reference = str_pad(Sale::max('id') + 1, 4, '0', STR_PAD_LEFT);

        return sprintf('%s%d%d', $terminal, now()->year, $reference);
    }

    /**
     * @return Collection<SaleDetail>
     */
    private function collectSaleDetails(array $details): Collection
    {
        return collect($details)->map(function ($detail) {
            if (!$this->validateNumber($detail['product_id'], $detail['quantity'], $detail['price'])) {
                throw new \InvalidArgumentException('Datos inválidos en venta');
            }

            return new SaleDetail($detail);
        });
    }
}
