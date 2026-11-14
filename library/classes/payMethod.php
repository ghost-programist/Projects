<?php 

interface PaymentMethod{
    public function pay(float $amount): void;
}

class Card implements PaymentMethod {
    public function pay(float $amount): void {
        echo "Оплата картой: $amount";
    }
}

class Cash implements PaymentMethod {
    public function pay(float $amount): void {
        echo "Оплата наличными: $amount";
    }
}

class PayPal implements PaymentMethod {
    public function pay(float $amount): void {
        echo "Оплата через PayPal: $amount";
    }
}

?>