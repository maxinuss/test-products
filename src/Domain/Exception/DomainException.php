<?php
declare(strict_types=1);

namespace Products\Domain\Exception;

interface DomainException
{
    public function message();
}
