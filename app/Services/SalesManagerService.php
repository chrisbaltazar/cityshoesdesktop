<?php

namespace App\Services;

use App\Models\Enums\Payments;
use App\Models\Enums\SaleTypes;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Services\Traits\ValidateValue;
use Illuminate\Support\Collection;

class SalesManagerService
{

    use ValidateValue;


    public function create(array $data): Sale
    {
        $details = $this->collectSaleDetails($data['details']);

        $sale = Sale::create([
            'store_id' => 1, // TODO change to auth store
            'staff_id' => 1, // TODO load salesman
            'type' => $this->getSaleType($data['type']),
            'payment' => $this->getPaymentType($data['type']),
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
            if (!$this->validateNumber($detail['quantity'], $detail['price'])) {
                throw new \InvalidArgumentException('Datos inválidos en venta');
            }

            // TODO remove once the data migration is done
            $detail['product_id'] = Product::where('name', $detail['product'])->firstOrFail()->id;

            return new SaleDetail($detail);
        });
    }

    public function getPaymentType(string $type): string
    {
        return Payments::tryFrom($type)->value ?? Payments::CASH->value;
    }

    public function getSaleType(string $type): string
    {
        if($type === Payments::CARD->value){
            return SaleTypes::SIMPLE->value;
        }

        return SaleTypes::from($type)->value;
    }
}
