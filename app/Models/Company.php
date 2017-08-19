<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $jurisdiction_id
 * @property string $activity
 * @property string $registration_number
 * @property string $registration_date
 * @property string $account_due_date
 * @property string $incorporation_date
 * @property int $year_end
 * @property string $information_notes
 * @property string $treasury_notes
 * @property string $auditors
 * @property string $agents
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $author_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereAccountDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereAgents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereAuditors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereIncorporationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereInformationNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereJurisdictionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereTreasuryNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereYearEnd($value)
 */
class Company extends Model
{
    //
}
