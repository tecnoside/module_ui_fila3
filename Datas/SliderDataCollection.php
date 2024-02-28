<?php

declare(strict_types=1);

namespace Modules\UI\Datas;

use Spatie\LaravelData\Data;
use Modules\UI\Datas\SliderData;
use Spatie\LaravelData\DataCollection;

class SliderDataCollection extends Data
{
    public function __construct(
        /**
         * @var DataCollection<SliderData>
         */
        public DataCollection $slider_data

    ) {
    }
}