<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

   //[
    
      'Footer'=> [
        'about_us'=> 'about WorkTime ',
        'contact_us'=> 'Connect us',
        'allrights'=> 'All Rights Reserved Worktime-2021'
      ],
      'Header'=> [
        'language'=> [
          'ar'=> 'Arabic',
          'en'=> 'English'
        ],
        'Menu'=> [
          'accountSetting'=> 'Account settings',
          'logOut'=> 'log out '
        ]
      ],
      'Navbar'=> [
        'Home'=> 'Home',
        'tenders'=> 'Tenders',
        'about_us'=> 'about us ',
        'contact_us'=> 'Connect us',
        'en'=> 'English',
        'ar'=> 'عربي',
        'login'=> 'login',
        'signup'=> 'signup',
        'service'=>'Service',
        'blog'=> 'blogs',
      ],
      'aboutus'=> [
        'description'=>'work time هو موقع الكتروني    مصمم علئ شبكه الانترنت متخصص في اعلان ونشر كل  المناقصات بكل انواعها سواء كانت مناقصات توريدات او مناقصات انشائيه خدميه اومناقصات اخرئ..واعلانات التأهيل المسبق للمقاولين والموردين ومقدمي الخدمات وكذالك اعلان الوظائف المهنيه لكي يصل اعلاننا للمناقصه والوظائف الئ اكبر شريحه ممكنه .. تم اطلاق موقع work time عام 2021 حيث يساعد جميع الافراد والشركات والمقاولين والموردين علئ متابعه العطاءات والوظائف الجديده ...',
        'vesion'=>'Our vision',
        'vesionDes'=>'نطمح الئ ان تكون الشركه اكبر واهم موقع اعلانات للمناقصات والوظائف لكل الافراد والمؤسسات في المجتمع كامل .. ويكون اسهل واسرع موقع يتم استخدامه ويستفيد منه الجميع بشكل كبير ..  وبأن نعمل علئ وصول المناقصات الئ جميع الشركات والمقاولين والموردين المهتمين بالعطاءات الجديده .. وايضا العمل علئ وصول اعلان الوظائف الئ اكبر شريحه من ذوي الخبرات والخريجين المؤهلين للمشاركه في اماكن العمل بكل ثقه ..',
        'services'=>'Our services',
        'servicesDes'=>'تزويد الباحثين عن العطاءات والمناقصات الجديده في كل المجالات من خلال موقعنا بكل سهوله وسرعه وبميزه وصولهم تنبيه اشعارات بكل المناقصات الجديده...  وكذالك تزويد الباحث عن عمل بالقدره علئ العثور علئ الوظيفه التي يرئ نفسه مؤهل لها من خلال ادوات البحث عن جميع الوظائف المصنفه في موقعنا وبخدمه شعارات التنبيهات للوظائف والاشتراك بالفرص الجديده ..'
      ],
      'Drawer'=> [
        'Dashboard'=> 'Dashboard',
        'jobs&tendersManagement'=> 'Jobs & Tenders Management ',
        'tendersManagement'=> 'Tenders Management',
        'MajorsManagement'=> 'Majors Management '
      ]
    ,
    'validation'=> [
      'startDateValidation'=> 'The tender publication date should be smaller than the end date.',
      'endDateValidation'=> 'The expiry date must be greater than the publication date.',
      'filetype'=> 'The file format should be zip or pdf',
      'emptyfieldrequired'=> 'This field must be filled.',
      'chooserequired'=> 'This field is required.',
      'exceededlimitation'=> 'You have exceeded the limit for writing',
      'undermainlimitation'=> 'It should not be less than 50 characters.',
      'emailvalidation'=> 'The email must be written correctly.',
      'wrongfieldinfo'=> 'Error entering data',
      'passwordnotmuch'=> 'Password does not match',
      'phoneno'=> 'This field must be filled in correctly',
      'imagename'=> 'The file you chose is not an image',
      'imagesize'=> 'File size should be 500 * 500',
      'imagetype'=> 'The image should be png, jpg, jpeg',
      'PasswordValidation'=> 'It should be more than 8 and contain lowercase letters, upper case letters, numbers and at least one symbol.',
      'example'=> [
        'name'=> 'Example=> Mohammed Ahmed',
        'firstname'=> 'Example=> Mohammed',
        'lastname'=> 'Example=> Ahmed',
        'email'=> 'Example=>example@gmail.com'
      ]
    ],
    'Home'=> [
      'Tenders'=> 'Tenders',
      'latestTenders'=> 'latestTenders',
      'majorsTenders'=> 'Tenders according to the departments',
      'Tenders&JobsAlerts'=> 'Tenders Jobs Alerts',
      'visti_website' =>' visit web site',

    ],
    'LogIn'=> [
      'LogInTitle'=> 'Login',
      'ForgitPwd'=> 'Forgot your password',
      'RemmberMe'=> 'Remember me',
      'Submit'=> 'Submit',
      'Email'=> 'Email',
      'Pwd'=> 'password',
      'IhaveAccount'=> 'I dont have an account'
    ],
    'Tenders'=> [
      'Title'=> 'Tenders',
      'name'=> 'Title of the Tender',
      'image'=> 'Tender image',
      'downloadpdfs'=> 'File Upload',
      'major'=> 'the major',
      'more'=> 'More information',
      'location'=> 'location',
      'company'=> 'Company / organization',
      'applyLink'=> 'Apply Link',
      'startDate'=> 'Start Date',
      'postedDate'=> 'Posted Date ',
      'Deadline'=> 'Deadline ',
      'description'=> 'description ',
      'save'=> 'Save',
      'action'=> 'Action',
      'AddNew'=> ' Add a new Tender ',
      'filter'=> 'filter '
    ],
    'Majors'=> [
      'Title'=> 'Majors',
      'Tenders'=> 'Tenders Majors',
      'Jobs'=> 'Jobs Majors ',
      'AddNew'=> 'Add a new Major',
      'UpdateMajor'=> 'Edit Major',
      'name'=> ' Title of the Major',
      'active'=> 'Active',
      'disabled'=> 'disabled ',
      'activate'=> 'Activation',
      'deactivate'=> 'Deactivate',
      'status'=> 'Status',
      'save'=> 'حفظ',
      'Update'=> 'Edit',
      'Delete'=> 'Delete',
      'action'=> 'Action'
    ],
    'apisuccessmesages'=> [
      'title'=> 'successfully'
    ],
    'apifailmessages'=> [
      'apiFail'=> 'An error occurred, check your internet connection, if the problem persists, contact the support center to find out the reason',
      'title'=> 'Sorry'
    ],
    'ContactUS'=> [
      'Tittle'=> ' Connect us',
      'Name'=> 'Name',
      'Email'=> 'Email ',
      'Send'=> 'Send',
      'Message'=> 'Put your message here',
      'description'=> 'If you have any questions regarding our services, please fill the form below and we will try to get back to you as soon as possible. '
    ],
    'cities'=> [
      'Abyan'=> 'Abyan',
      'Aden'=> 'Aden',
      'AlMahrah'=> 'Al Mahrah',
      'AlMahwit'=> 'Al Mahwit',
      'Sanaa'=> "Sana'a",
      'Amran'=> 'Amran',
      'Dhale'=> 'Dhale',
      'Dhamar'=> 'Dhamar',
      'Hadramaut'=> 'Hadramaut',
      'AlJawf'=> 'Al Jawf',
      'Hajjah'=> 'Hajjah',
      'Ibb'=> 'Ibb',
      'Lahij'=> 'Lahij',
      'Marib'=>"Ma'rib",
      'AlBayda'=> 'Al Bayda',
      'Raymah'=> 'Raymah',
      'Sadah'=> "Sa'dah",
      'AmanatAlAsimah'=> 'Amanat Al Asimah (Sanaa City)',
      'Shabwah'=> 'Shabwah',
      'Socotra'=> 'Socotra',
      'Taiz'=> 'Taiz'
    ],
  //]

  'Jobs'=> [
    'Title'=> 'Jobs',
    'Titles'=> 'Jobs list',
    'name'=> 'Title of the Job',
    'image'=> 'Tender image',
    'downloadpdfs'=> 'File Upload',
    'major'=> 'the major',
    'more'=> 'More information',
    'location'=> 'location',
    'company'=> 'Company / organization',
    'applyLink'=> 'Apply Link',
    'startDate'=> 'Start Date',
    'postedDate'=> 'Posted Date ',
    'Deadline'=> 'Deadline ',
    'description'=> 'description ',
    'save'=> 'Save',
    'action'=> 'Action',
    'AddNew'=> ' Add a new Job ',
    'filter'=> 'filter ',
    'Notify'=> 'create notify jobs',
    'cv' => 'upload your cv here',
    'RCom' => 'upload your recommendation here',
    'req_pdf'=>'must be pdf ',
    'submit'=>'Apply now',
    'applaying'=>'To apply through our website, please enter your information',
    'others' => 'Other Jobs',
    'applaylink'=> 'Visit website Applaying  ',
    'applayEmail'=> 'Sending Email Applaying  ',
    'toapplying'=>'To visit the Link or Email of applying '



  ],

  'Services'=> [
    'Title'=> '  Services list ',
    'others'=>  'Other Services',
    'description' =>'Service Description',
  ],
  'blogs'=> [
    'Title'=> 'The blog',
    'others'=> 'Other Articals ',
    'description' => 'Artical Description ',

  ],
  
  
 // Dashbored

  /** Advertisment */
  /**Show Advertising */
  'Advertising'=>[
    'Title'=> 'Advertisement List',
    'image'=> 'image',
    'link'=> 'link',
    'status'=> 'status',
    'Actions'=> 'Actions',
    'Active'=> 'Active',
    'notActive'=> 'not Active',
  ],
  /**Add Advertising*/
  'AdvertisingAdd'=>[
    'TitlePage'=> 'Create New Advertising',
    'image'=> 'Advertising image',
    'choose'=> 'Choose image',
    'Title'=> 'Title',
    'link'=> 'link',
    'Submit'=> 'Create Advertising',
  ],
  /**Edite Advertising*/
  'AdvertisingEdite'=>[
    'Tilte'=> 'Edite Advertising',
    'Submit'=> 'Edite Advertising',
  ],

  /** Blogs */
  /**Show Blogs */
  'Blog'=>[
    'TitlePage'=> 'Blogs List',
    'Title'=> 'blogs title',
    'SubTiltle'=> 'sub_title',
    'image'=> 'image',
    'description'=> 'description',
    'status'=> 'status',
    'Actions'=> 'Actions',
    'Active'=> 'Active',
    'notActive'=> 'not Active',
  ],
  /**Add Blogs */
  'BlogAdd'=>[
    'TitlePage'=> 'Create New Blog',
    'image'=> 'Blog image',
    'choose'=> 'Choose image',
    'Title'=> 'Title',
    'SubTiltle'=> 'Sub_Title',
    'description'=> 'Description',
    'Submit'=> 'Create Blog'
  ],
  /**Edite Blogs */
  'BlogEdite'=>[
    'Title'=> 'Edite blog',
    'Submit'=> 'Edite blog',
  ],

  /** Jobs */
  /**Show Jobs */
  'Jobs'=>[
    'TitlePage'=> 'Job List',
    'Title'=> 'jobs title',
    'location'=> 'location',
    'company'=> 'company',
    'deadline'=> 'deadline',
    'status'=> 'status',
    'Actions'=> 'Actions',
    'Active'=> 'Active',
    'notActive'=> 'not Active',
  ],
  /**Add Jobs */
  'JobsAdd'=>[
    'TitlePage'=> 'Create New Job',
    'Title'=> 'Title',
    'Major'=> 'Major',
    'Location'=> 'Location',
    'OtharLocation'=> 'Othar Location',
    'Company'=> 'Company',
    'start_date'=> 'start_date',
    'image'=> 'Job image',
    'choose'=> 'Choose image',
    'deadline'=> 'deadline',
    'PostedDate'=> 'Posted Date',
    'Description'=> 'Description',
    'massege'=> 'Can the application be via the website or communication with the company?',
    'No'=> 'No',
    'Yes'=> 'Yes',
    'Both'=> 'Both',
    'link'=> 'link',
    'email'=> 'email',
    'Recommendation'=> 'Recommendation',
    'Submit'=> 'Create Job',
  ],
  /**Edite Jobs */
  'JobsEdite'=>[
    'Title'=> 'Edite job',
    'Submit'=> 'Eidte job',
  ],

  /** Majors */
  /**Show Major */
  'Major'=>[
    'Title'=> 'Major List',
    'Name'=> 'Mjaor Name',
    'type'=> 'type',
    'status'=> 'status',
    'Actions'=> 'Actions',
    'Active'=> 'Active',
    'notActive'=> 'not Active',
  ],
  /**Add Major */
  'MajorAdd'=>[
    'Title'=> 'Add New Major',
    'Name'=> 'Mjaor Name',
    'Type'=> 'Type',
    'Tender'=> 'Tender',
    'Job'=> 'Job',
    'Submit'=> 'Create Major',
  ],
  /**Edite Major */
  'MajorEdite'=>[
    'Title'=> 'Edite Major',
    'Name'=> 'Mjaor Name',
    'Type'=> 'Type',
    'Tender'=> 'Tender',
    'Job'=> 'Job',
    'Submit'=> 'Edite Major',
  ],
];