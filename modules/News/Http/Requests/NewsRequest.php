<?php

namespace Modules\News\Http\Requests;

use App\Models\PhotoLibrary;
use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Category\Entities\Category;
use Modules\Localize\Entities\Language;
use Modules\Reporter\Entities\Reporter;

class NewsRequest extends FormRequest
{
    use FormRequestTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categoryPositions   = generate_positions(1, 16);
        $homeSliderPositions = generate_positions(1, 7);

        $rules = [
            'language_id'            => ['required', 'integer', Rule::exists(Language::class, 'id')],
            'other_page'             => ['required', 'string', Rule::exists(Category::class, 'id')],
            'sub_category_id'        => ['nullable', 'string', Rule::exists(Category::class, 'id')],
            'other_position'         => ['nullable', 'integer', 'in:' . implode(',', $categoryPositions)],
            'home_page'              => ['nullable', 'integer', 'in:' . implode(',', $homeSliderPositions)],
            'publish_date'           => ['required', 'date_format:' . get_date_picker_format()],
            'short_head'             => ['nullable', 'string'],
            'head_line'              => ['required', 'string'],
            'details_news'           => ['required', 'string'],
            'lib_file_selected'      => ['nullable', 'string', Rule::exists(PhotoLibrary::class, 'actual_image_name')],
            'image_alt'              => ['nullable', 'string'],
            'image_title'            => ['nullable', 'string'],
            'custom_url'             => ['nullable', 'string'],
            'seo_title'              => ['nullable', 'string'],
            'videos'                 => ['nullable', 'string'],
            'reference'              => ['nullable', 'string'],
            'post_tag'               => ['nullable', 'string'],
            'meta_keyword'           => ['nullable', 'string'],
            'meta_description'       => ['nullable', 'string'],
            'latest_confirmed'       => ['nullable', 'string'],
            'reporter_message'       => ['nullable', 'string'],
            'breaking_confirmed'     => ['nullable'],
            'status_confirmed'       => ['nullable'],
            'feature_news'           => ['nullable', 'boolean'],
            'recommanded_news'       => ['nullable', 'boolean'],
            'schemasetup'            => ['nullable'],
            'ref_date'               => ['nullable', 'string', 'date_format:' . get_date_picker_format()],
            'confirm_dynamic_static' => ['nullable'],
            'is_auto_post'           => ['nullable', 'boolean'],
        ];

        if (auth()->user()->user_type_id == 1) {
            $rules['reporter_id'] = ['required', 'integer', Rule::exists(Reporter::class, 'id')];
        } else {
            $rules['reporter_id'] = ['nullable', 'integer', Rule::exists(Reporter::class, 'id')];
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
