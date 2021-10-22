<?php

// @formatter:off
/**
 * A Helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $student_id
 * @property int $subject_id
 * @property int $amount_paid
 * @property int $balance_amt
 * @property string $date_paid
 * @property-read \App\Models\Students $students
 * @property-read \App\Models\Subject $subjects
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereBalanceAmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDatePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereSubjectId($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentHistory
 *
 * @property int $id
 * @property int $student_id
 * @property int $amount_paid
 * @property-read \App\Models\Students $students
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentHistory whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentHistory whereStudentId($value)
 */
	class PaymentHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Students
 *
 * @property int $id
 * @property string $first_nm
 * @property string $last_nm
 * @property string $dob
 * @property string $class
 * @property int $phone_nbr
 * @property string $email_addr
 * @property string $gender
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SubjectChoice[] $subjectChoice
 * @property-read int|null $subject_choice_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Students newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Students newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Students query()
 * @method static \Illuminate\Database\Eloquent\Builder|Students whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Students whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Students whereEmailAddr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Students whereFirstNm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Students whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Students whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Students whereLastNm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Students wherePhoneNbr($value)
 */
	class Students extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subject
 *
 * @property int $id
 * @property string $subject_nm
 * @property int $cost_amt
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SubjectChoice[] $subjectChoice
 * @property-read int|null $subject_choice_count
 * @method static \Illuminate\Database\Eloquent\Builder|Subject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereCostAmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereSubjectNm($value)
 */
	class Subject extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubjectChoice
 *
 * @property int $id
 * @property int $student_id
 * @property int $subject_id
 * @property int $status
 * @property string $year_of_exam
 * @property-read \App\Models\Students $students
 * @property-read \App\Models\Subject $subjects
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectChoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectChoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectChoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectChoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectChoice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectChoice whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectChoice whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectChoice whereYearOfExam($value)
 */
	class SubjectChoice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property int $student_id
 * @property int $amount_due
 * @property int $amount_paid
 * @property int $balance_amt
 * @property string $year_of_exam
 * @property-read \App\Models\Students $students
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmountDue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereBalanceAmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereYearOfExam($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

