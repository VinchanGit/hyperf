<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace HyperfTest\Validation\Cases\Stub;

use Hyperf\Validation\Request\FormRequest;
use Hyperf\Validation\Annotation\Rules;

class BarAnnotationRequest extends FormRequest
{
    public array $scenes = [

    ];

    #[Rules('required', 'mobile', ['save'])]
    private string $mobile;

    #[Rules('required', 'name', ['info'])]
    private string $name;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}
