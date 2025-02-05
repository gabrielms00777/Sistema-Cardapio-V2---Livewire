@props(['price'])

<span>
    {{-- {{ \Illuminate\Support\Number::toCurrency(5.49, currency: 'BRL', locale: 'pt_BR') }} --}}
    {{ (new NumberFormatter('pt_BR', NumberFormatter::CURRENCY))->formatCurrency($price, 'BRL') }}
</span>
