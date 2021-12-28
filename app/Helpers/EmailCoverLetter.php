<?php

namespace App\Helpers;

class EmailCoverLetter
{
    public static function emailCoverLettersCategory(){
        return [
            "job_search", "application", "interview", "follow_up", "acceptance_rejection", "post_offer"
        ];
    }

    public static function emailCoverLetters(){
        return [
            "0" => [
                "id" => 1,
                "title" => "Someone you used to work closely with",
                "category" => "job_search",
                "subject" => '<p><strong>SOMEONE YOU USED TO WORK CLOSELY WITH</strong><br />Perhaps it&rsquo;s your supervisor from your college internship. Or maybe it&rsquo;s your favourite colleague from one of your previous jobs. Either way, nobody knows your skills and preferences better than the people you used to work side-by-side with, this means they can be a huge help in your job search.<br />&nbsp;</p>',
                "letter_details" => '<p>Hey [Name],<br />I hope you&rsquo;re having a great week! I&rsquo;ve been keeping up with you on LinkedIn, and it looks like things are going awesome with [job or professional interest].<br />I&rsquo;m getting in touch to let you know that I&rsquo;m currently searching for a new opportunity in [industry]. With my background in [field] and skills in [area], my ideal position involves [detailed description of ideal job] for an employer who [detailed description of ideal company].<br />Since we used to work so closely and I know you&rsquo;re so well-connected, I&rsquo;d love if you could let me know if you hear of any opportunities that you think I&rsquo;d be a good fit for. I&rsquo;ve attached my resume to this email, just in case that helps.<br />Of course, I&rsquo;m always willing to return the favour if you ever need.<br />Thanks so much, [Name]! I have so many fond memories of our time together at [Company], and I hope things are even better for you since then.<br />Best,<br />[Your Name]<br />&nbsp;</p>',
                "image" => "/frontend/images/email-sample/1.jpg",
                "is_available" => 1,
            ], 
            "1" => [
                "id" => 2,
                "title" => "Someone who works in your desired industry",
                "category" => "job_search",
                "subject" => '<p><strong>SOMEONE WHO WORKS IN YOUR DESIRED INDUSTRY</strong><br />Sending a note to someone who is already employed in the field you&rsquo;re eager to be a part of is always helpful, but especially when you&rsquo;re making a career change. Chances are good that he or she is connected to other people in the industry&ndash;some of whom might even be hiring.</p>',
                "letter_details" => '<p>Hello [Name],<br />I hope you&rsquo;re doing well!<br />I&rsquo;m reaching out to let you know that I&rsquo;ve decided to make a career change. Thus, I&rsquo;m currently exploring different opportunities in [industry].<br />Since I know you&rsquo;ve worked in the industry for quite a while, I thought you&rsquo;d be the perfect person to get in touch with. If you become aware of any open roles that might be a good fit for someone with a background in [field], skills in [area], and a desire to learn, I&rsquo;d love if you could give me a heads up. You can also find my resume attached to this email to get a better understanding of what I bring to the table.<br />I can&rsquo;t tell you how much I appreciate any help as I work on making this switch.<br />Thanks so much, [Name]!<br />All the best,<br />[Your Name]<br />&nbsp;</p>',
                "image" => "/frontend/images/email-sample/2.jpg",
                "is_available" => 1,
            ],
            "2" => [
                "id" => 3,
                "title" => "Someone you're hoping will make an intro",
                "category" => "job_search",
                "subject" => '<p><strong>SOMEONE YOU&rsquo;RE HOPING WILL MAKE AN INTRO</strong><br />You&rsquo;ve identified someone that you know could be a huge asset to you in your job search. The only problem? You don&rsquo;t know him or her yourself. Fortunately, someone in your own network is connected to that person&ndash;and you&rsquo;re hoping you can get introduced.<br />&nbsp;</p>',
                "letter_details" => '<p>Hey [Name],<br />I hope things have been going great for you!<br />I&rsquo;m touching base today with a request. I&rsquo;m currently pursuing new jobs in [industry] and am actively working on making more connections within this field.<br />I noticed that you know [Name], and I was hoping that you&rsquo;d be willing to connect me with [him/her]. As I&rsquo;m sure you know [Name] has a ton of great insights into my area of interest, and I&rsquo;d love to get connected so that I could ask [him/her] a few questions about the industry and [his/her] experience in general.<br />Would you be willing to send a brief email introducing the two of us? I&rsquo;d appreciate that so much.<br />Don&rsquo;t hesitate to let me know if you have any questions, [Name].<br />Thanks for your consideration!<br />Best,<br />[Your Name]<br />&nbsp;</p>',
                "image" => "/frontend/images/email-sample/3.jpg",
                "is_available" => 1,
            ],
            "3" => [
                "id" => 4,
                "title" => "Anyone else",
                "category" => "job_search",
                "subject" => '<p><strong>ANYONE ELSE</strong><br />Then there&rsquo;s everybody else in your network&ndash;the&nbsp;acquaintances&nbsp;that you&rsquo;re somewhat in touch with, yet don&rsquo;t fall into any of the categories above.<br />Rest assured, it can still be worth updating them on your job hunt (provided it&rsquo;s not a totally out-of-the-blue message to somebody you&rsquo;ve never actually met or interacted with). The more people you have keeping the ear to the ground, the better your search for a new position will go.<br />&nbsp;</p>',
                "letter_details" => '<p>Hello [Name],<br />I hope things have been awesome!<br />I&rsquo;m writing you a quick note to let you know that I&rsquo;m currently searching for a new career opportunity in [desired industry]. With my background in [area], I&rsquo;m ideally looking for a [type of position] role with an employer who [describe ideal employer]. For a greater understanding of my professional qualifications, you can find my resume attached to this email.<br />If you hear of anything within your own network that you think might fit the bill, I&rsquo;d so appreciate if you could send a heads up my way.<br />Let me know if I can ever return the favor, [Name]. I&rsquo;m happy to do so!<br />Thanks,<br />[Your Name]</p>',
                "image" => "/frontend/images/email-sample/4.jpg",
                "is_available" => 1,
            ],
            "4" => [
                "id" => 5,
                "title" => "Career Starter",
                "category" => "application",
                "subject" => '<p><strong>Career Starter</strong><br />&nbsp;</p>',
                "letter_details" => '<p>Dear (Name of the Hiring Manager),</p><p>I came across this position, I am interested in applying for the position of (job title) at (name of the company). After reading the job description and requirements, I know that I would be a valuable asset to your organization.</p><p>&nbsp;I recently graduated with a (name of the degree) in (name of the stream) from the (name of the university). I wish to apply my skills in a company like yours. I can implement concepts to design innovative and ingenious products.</p><p>I have attached a cover letter and resume for your consideration along with this email. I would love to discuss more details regarding the opportunity. It would be a pleasure to hear back from you regarding my application.</p><p>Best Regards,<br />(your name).<br />&nbsp;</p>',
                "image" => "/frontend/images/email-sample/5.jpg",
                "is_available" => 1,
            ],
            "5" => [
                "id" => 6,
                "title" => "Mid Career & Experienced",
                "category" => "application",
                "subject" => '<p><strong>Mid Career &amp; Experienced</strong><br />&nbsp;</p>',
                "letter_details" => '<p>Dear (Name of the Hiring Manager),</p><p>I came across an interesting position of (job title) on your website. I have 4 years of experience as a (job title) at (name of the previous company). My skills and expertise could make me a valuable asset to your organization.</p><p>After graduating with a degree in (name of the subject), I worked at (name of the company) as (designation) for (duration) years. I wish to challenge myself in a new environment and your company offers that.</p><p>I have attached a cover letter and resume for your consideration along with this email. I would love to discuss more details regarding the opportunity. It would be a pleasure to hear back from you regarding my application.</p><p>Best Regards,<br />(your name).<br />&nbsp;</p>',
                "image" => "/frontend/images/email-sample/6.jpg",
                "is_available" => 1,
            ],
            "6" => [
                "id" => 7,
                "title" => "Responding to the call for connect or an interview",
                "category" => "interview",
                "subject" => '<p><strong>Responding to the call for connect or an interview</strong></p>',
                "letter_details" => '<p>Dear (Name of the Hiring Manager),</p><p>Thank you for inviting me for the interview for the (job title) position at (name of the company). I appreciate your consideration and look forward to meeting you soon.</p><p>I am available on (day, date, time of the week), let me know of your convenience. I am excited to learn more about the opportunity. Thank you for your time and consideration.</p><p>Best Regards,<br />(your name).<br />&nbsp;</p>',
                "image" => "/frontend/images/email-sample/7.jpg",
                "is_available" => 1,
            ],
            "7" => [
                "id" => 8,
                "title" => "Post meeting - thank you email",
                "category" => "interview",
                "subject" => '<p><strong>Post meeting - thank you email</strong></p>',
                "letter_details" => '<p>Dear (Name of the Hiring Manager),</p><p>Thank you so much for meeting with me today. It was a pleasure to learn about the team and position, and I&rsquo;m very excited to join (company&rsquo;s name) and help (bring in new clients/develop world-class content) along with the team.</p><p>Please let me know if you need any additional information from my end. I look forward to hearing from you about the next steps in the hiring process.</p><p>Best Regards,<br />(your name)<br />&nbsp;</p>',
                "image" => "/frontend/images/email-sample/8.jpg",
                "is_available" => 1,
            ],
            "8" => [
                "id" => 9,
                "title" => "Follow-up email after application",
                "category" => "follow_up",
                "subject" => '<p><strong>Follow-up email after application</strong></p>',
                "letter_details" => '<p>Hello (Name of the Hiring Manager),</p><p>I recently applied to the (position title) and wanted to check in on your decision timeline. I am excited to join (name of the company) and help (bring in new clients/develop world-class content) along with the team.</p><p>Please let me know if you require additional information as you move on to the next stage in the hiring process. I look forward to hearing from you soon.</p><p>Best Regards,<br />(your name).</p>',
                "image" => "/frontend/images/email-sample/9.jpg",
                "is_available" => 1,
            ],
            "9" => [
                "id" => 10,
                "title" => "Acceptance of an offer Email",
                "category" => "acceptance_rejection",
                "subject" => '<p><strong>Acceptance of an offer Email</strong></p>',
                "letter_details" => '<p>Dear (Name of the Hiring Manager), I extend my gratitude to you for offering me the position of (job title) at (Name of the company). I am delighted to accept your offer and look forward to commencing work with your company from (date). As we discussed, my annual salary will be (salary). Kindly let me know of the documents that I have yet to submit. I hope to complete all the formalities prior to my joining so that I can start my work efficiently. I thank you again for providing me with this wonderful opportunity. I am excited to be a part of the team and make notable contributions to it. Best Regards, (your name).</p>',
                "image" => "/frontend/images/email-sample/10.jpg",
                "is_available" => 1,
            ],
            "10" => [
                "id" => 11,
                "title" => "Negotiation Email after receiving an offer",
                "category" => "acceptance_rejection",
                "subject" => '<p><strong>Negotiation Email after receiving an offer</strong></p>',
                "letter_details" => '<p>Hi (Name of the Hiring Manager),</p><p>Thank you for your consideration for the post of (job title) at (name of the company). I want to be on the same page about compensation, before I accept your offer. As I mentioned, (amount of expected salary) is my salary floor, and my research shows that (amount) is the current market rate for this role. I wanted to know what could be the best way for us to bridge the gap in pay.&nbsp;</p><p>I look forward to hearing on finalizing the offer so that it meets both of our needs.</p><p>Best Regards,<br />(your name).<br />&nbsp;</p>',
                "image" => "/frontend/images/email-sample/11.jpg",
                "is_available" => 1,
            ],
            "11" => [
                "id" => 12,
                "title" => "Rejection of an offer Email",
                "category" => "post_offer",
                "subject" => '<p><strong>&nbsp;Rejection of an offer Email</strong></p>',
                "letter_details" => '<p>Dear (Name of the Hiring Manager),</p><p>Thank you so much for offering the position of (job title) at (name of the company). I appreciate you taking the time to consider me and answering my questions about the company and role.</p><p>While this position seems like a great opportunity, I&rsquo;ve decided that now would not be the best time for me to accept this offer. It was a pleasure getting to know you, and I hope that we cross paths in the future.</p><p>I thank you for your time and support and wish you all the best.<br />Best Regards,<br />(your name).<br />&nbsp;</p>',
                "image" => "/frontend/images/email-sample/12.jpg",
                "is_available" => 1,
            ]
        ];
    }
}
