<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php82\Rector\Class_\ReadOnlyClassRector;
use Rector\Php83\Rector\ClassConst\AddTypeToConstRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Transform\Rector\Attribute\AttributeKeyToClassConstFetchRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeFromPropertyTypeRector;
use Rector\TypeDeclaration\Rector\Property\AddPropertyTypeDeclarationRector;
use Rector\ValueObject\PhpVersion;

return static function (RectorConfig $config): void {
    $config->paths([
        __DIR__.'/src',
        __DIR__.'/tests',
    ]);

    $config->rules([
        AddTypeToConstRector::class,
        ReadOnlyClassRector::class,
        AttributeKeyToClassConstFetchRector::class,
        AddPropertyTypeDeclarationRector::class,
        AddParamTypeDeclarationRector::class,
        AddParamTypeFromPropertyTypeRector::class,
    ]);

    $config->phpVersion(PhpVersion::PHP_83);

    $config->sets([
        LevelSetList::UP_TO_PHP_83,
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::TYPE_DECLARATION,
        SetList::RECTOR_PRESET,
        SetList::EARLY_RETURN,
    ]);

    $config->autoloadPaths([
        __DIR__.'/vendor/autoload.php',
    ]);

    $config->skip([
        __DIR__.'/var',
        __DIR__.'/vendor',
    ]);
};
