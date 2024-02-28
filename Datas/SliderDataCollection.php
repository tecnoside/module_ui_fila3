<?php

declare(strict_types=1);

namespace Modules\UI\Datas;

use Spatie\LaravelData\Data;
use Modules\UI\Datas\SliderData;
use Illuminate\Support\Collection;
use Spatie\LaravelData\DataCollection;

class SliderDataCollection extends Data
{
    /**
     * @var DataCollection<SliderData>
     */
    public DataCollection $slider_data;

    public function __construct(


    ) {
    }
}