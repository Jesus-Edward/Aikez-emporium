<?php

/** Creating a unique slug */

if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($model, $name): string
    {
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new InvalidArgumentException("Model $model not found");
        }

        $slug = Illuminate\Support\Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Illuminate\Support\Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

if (!function_exists('generateUniqueSKU')) {
    function generateUniqueSKU($productName, $size=null)
    {
        $companyName = 'AIKEZ';
        $nameCode = strtoupper(Illuminate\Support\Str::substr(Illuminate\Support\Str::slug($productName, ''), 0, 3));
        $sizeCode = $size ? strtoupper(str_replace([' ', 'sqm', 'x', 'X', 'SQM'], '', $size)) : '0000';
        $dateCode = now()->format('Ymd');
        $uniqueId = str_pad(random_int(1, 999), 3, '0', STR_PAD_LEFT);

        return "{$companyName}-{$nameCode}-{$sizeCode}-{$dateCode}-{$uniqueId}";
    }
}
