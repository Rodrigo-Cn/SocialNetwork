<?php

namespace App\Support;

class ValidationMessages
{
    public const ACCEPTED = 'O campo :attribute deve ser aceito.';
    public const ACTIVE_URL = 'O campo :attribute não é uma URL válida.';
    public const AFTER = 'O campo :attribute deve ser uma data posterior a :date.';
    public const AFTER_OR_EQUAL = 'O campo :attribute deve ser uma data posterior ou igual a :date.';
    public const ALPHA = 'O campo :attribute deve conter apenas letras.';
    public const ALPHA_DASH = 'O campo :attribute deve conter apenas letras, números, traços e sublinhados.';
    public const ALPHA_NUM = 'O campo :attribute deve conter apenas letras e números.';
    public const ARRAY = 'O campo :attribute deve ser um array.';
    public const BEFORE = 'O campo :attribute deve ser uma data anterior a :date.';
    public const BEFORE_OR_EQUAL = 'O campo :attribute deve ser uma data anterior ou igual a :date.';
    public const BETWEEN_NUMERIC = 'O campo :attribute deve estar entre :min e :max.';
    public const BOOLEAN = 'O campo :attribute deve ser verdadeiro ou falso.';
    public const CONFIRMED = 'A confirmação de :attribute não confere.';
    public const DATE = 'O campo :attribute não é uma data válida.';
    public const DATE_EQUALS = 'O campo :attribute deve ser uma data igual a :date.';
    public const DATE_FORMAT = 'O campo :attribute não corresponde ao formato :format.';
    public const DIFFERENT = 'Os campos :attribute e :other devem ser diferentes.';
    public const DIGITS = 'O campo :attribute deve ter :digits dígitos.';
    public const DIGITS_BETWEEN = 'O campo :attribute deve ter entre :min e :max dígitos.';
    public const DISTINCT = 'O campo :attribute tem um valor duplicado.';
    public const EMAIL = 'O campo :attribute deve ser um e-mail válido.';
    public const ENDS_WITH = 'O campo :attribute deve terminar com um dos seguintes: :values.';
    public const EXISTS = 'O campo :attribute selecionado é inválido.';
    public const FILE = 'O campo :attribute deve ser um arquivo.';
    public const FILLED = 'O campo :attribute é obrigatório.';
    public const GT = 'O campo :attribute deve ser maior que :value.';
    public const GTE = 'O campo :attribute deve ser maior ou igual a :value.';
    public const IMAGE = 'O campo :attribute deve ser uma imagem.';
    public const IN = 'O campo :attribute selecionado é inválido.';
    public const IN_ARRAY = 'O campo :attribute não existe em :other.';
    public const INTEGER = 'O campo :attribute deve ser um número inteiro.';
    public const IP = 'O campo :attribute deve ser um endereço IP válido.';
    public const IPV4 = 'O campo :attribute deve ser um endereço IPv4 válido.';
    public const IPV6 = 'O campo :attribute deve ser um endereço IPv6 válido.';
    public const JSON = 'O campo :attribute deve ser uma string JSON válida.';
    public const LT = 'O campo :attribute deve ser menor que :value.';
    public const LTE = 'O campo :attribute deve ser menor ou igual a :value.';
    public const MAX = 'O campo :attribute não deve ser maior que :max caracteres.';
    public const MIMES = 'O campo :attribute deve ser um arquivo do tipo: :values.';
    public const MIMETYPES = 'O campo :attribute deve ser um arquivo do tipo: :values.';
    public const MIN = 'O campo :attribute deve ter no mínimo :min caracteres.';
    public const NOT_IN = 'O campo :attribute selecionado é inválido.';
    public const NOT_REGEX = 'O formato do campo :attribute é inválido.';
    public const NUMERIC = 'O campo :attribute deve ser um número.';
    public const PRESENT = 'O campo :attribute deve estar presente.';
    public const REGEX = 'O formato do campo :attribute é inválido.';
    public const REQUIRED = 'O campo :attribute é obrigatório.';
    public const REQUIRED_IF = 'O campo :attribute é obrigatório quando :other é :value.';
    public const REQUIRED_UNLESS = 'O campo :attribute é obrigatório, a menos que :other esteja em :values.';
    public const REQUIRED_WITH = 'O campo :attribute é obrigatório quando :values está presente.';
    public const REQUIRED_WITH_ALL = 'O campo :attribute é obrigatório quando todos os :values estão presentes.';
    public const REQUIRED_WITHOUT = 'O campo :attribute é obrigatório quando :values não está presente.';
    public const REQUIRED_WITHOUT_ALL = 'O campo :attribute é obrigatório quando nenhum dos :values está presente.';
    public const SAME = 'Os campos :attribute e :other devem ser iguais.';
    public const SIZE = 'O campo :attribute deve ter :size caracteres.';
    public const STARTS_WITH = 'O campo :attribute deve começar com um dos seguintes: :values.';
    public const STRING = 'O campo :attribute deve ser uma string.';
    public const TIMEZONE = 'O campo :attribute deve ser uma zona válida.';
    public const UNIQUE = 'O campo :attribute já está em uso.';
    public const URL = 'O campo :attribute deve ser uma URL válida.';
    public const UUID = 'O campo :attribute deve ser um UUID válido.';
}
