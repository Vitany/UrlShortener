<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Url
 *
 * @method static Builder|Url newModelQuery()
 * @method static Builder|Url newQuery()
 * @method static Builder|Url query()
 * @mixin Eloquent
 * @property int $id
 * @property string $url
 * @property string $short_code
 * @property int $counter
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Url whereCounter($value)
 * @method static Builder|Url whereCreatedAt($value)
 * @method static Builder|Url whereId($value)
 * @method static Builder|Url whereShortCode($value)
 * @method static Builder|Url whereUpdatedAt($value)
 * @method static Builder|Url whereUrl($value)
 */
class Url extends Model
{
    //
}
