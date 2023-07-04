<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Student;
use App\Models\Ad;

class Newad extends Notification
{
    use Queueable;
 protected  $content ;
 protected  $title ;

    /**
     * Create a new notification instance.
     */
    public function __construct(Ad $ad )
    {
       $this->content=$ad->description;
       $this->title = $ad->title;

       // $this->$follower =  $follower->title;

  //dd( $this->$follower);
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array // notifiable يوزر لي تبي تبعتله ااشعار  // مرات تولي داينمك وتدبا حسب اعدات يوزر
    {
        return ['mail' , 'database'];

    }
//كل ميثود بتبعت بيها عندها ميتود خاص بيها mail to mail data to data
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    // كل ميثود حترجع نوع خاص من بيانات
    {
        return (new MailMessage)

        // massage عندها عنواان لو ماحددتاش بشكل افتراضي ياخد اسم الكلاس لي فيه
                    ->subject(' new Adverstment '.$this->title)
                   //->to($notifiable->email)          // هذا لمن تبي تبعت الاسعار
                    //->form('admin',config('app.name'))   //هادي لما تبي تحدد من وين جاية رسالة لو خليتها زي ماهيا راح يبعت حسب env
                    ->greeting('hi '.$notifiable->name )


                    ->line('  تمت اضافة اعلان جديد بالرجاء الاطلاع عليه '.$this->content )
                    ->action('Notification Action', url(route('profile.edit')))
                    ->line('  قم بمتابعة الاشعارات اولا باولا ');
                    //->view('')  */
                       // هذا لو انت ياحاج تبي  ماتبيش تعرض قالب خاص بي نيو مسج وتبي فيو خاص  new massage


    }
    public function todatabase(object $notifiable): array
    // كل ميثود حترجع نوع خاص من بيانات
    {
        return [

            // massage عندها عنواان لو ماحددتاش بشكل افتراضي ياخد اسم الكلاس لي فيه
           // 'subject' => 'new Adverstment '.$this->title
            //->to($notifiable->email)          // هذا لمن تبي تبعت الاسعار
             //->form('admin',config('app.name'))   //هادي لما تبي تحدد من وين جاية رسالة لو خليتها زي ماهيا راح يبعت حسب env
             'student_name' =>'hi '.$notifiable->name,


             'ad_content' =>' new  ad '.$this->title ,
             //'action' =>'Notification Action', url(route('profile.edit')),
            // 'line' =>'  قم بمتابعة الاشعارات اولا باولا ';
             //->view('')  */
                // هذا لو انت ياحاج تبي  ماتبيش تعرض قالب خاص بي نيو مسج وتبي فيو خاص  new massage


        ];



    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            // هادي هيا ديفولت لو ماعرفتش متلا تو داتا بيس راح ينفد هادي
        ];
    }
}
