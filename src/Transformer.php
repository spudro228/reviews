<?php

declare(strict_types=1);


namespace App;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\App\Command\AddNewReviewCommand;

class Transformer implements DataTransformerInterface
{

    public function transform($object, string $to, array $context = [])
    {
        return new AddNewReviewCommand(
            $object->stars,
            $object->comment,
        );
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return $to === AddNewReviewCommand::class ;
    }
}
