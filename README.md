# HeadHunter.ru API library (in process) (guzzle^7.8)

[![Latest Stable Version](https://poser.pugx.org/umk0/headhunter-api/v/stable)](https://packagist.org/packages/umk0/headhunter-api)


Provides a friendly API interface for HeadHunter (hh.ru) service.

Official API docs available [here](https://github.com/hhru/api).

 - [Installation](#installation)
 - [Quick Start](#quick-start)
 - [Vacancies](#vacancies)
 - [Employers](#employers)
 - [Employer Managers](#employer-managers)
 - [Artifacts](#artifacts)
 - [User](#user)
 - [Comments](#comments)
 - [Industries](#industries)
 - [Negotiations](#employee-negotiations)
 - [Regions](#regions)
 - [Resumes](#resumes)
 - [Saved searches](#saved-searches)
 - [Specializations](#specializations)
 - [Dictionaries](#dictionaries)
 - [Suggests](#suggests)
 - [Metro](#metro)
 - [Languages](#languages)
 - [Custom requests](#custom-requests)

## Dependencies

Requires PHP 5.6 or above.


## Installation

The recommended way to install this library is via [Composer](https://getcomposer.org). 
[New to Composer?](https://getcomposer.org/doc/00-intro.md)

```
composer require umk0/headhunter-api
```

## Quick Start

```php
// You may need to amend this path to locate composer's autoloader
require('vendor/autoload.php');
use umk0\HeadHunterApi\Api;

/**
 * Token is optional. Your need token only
 * for resources that require authentication
 */
$api = Api::create('YOUR_TOKEN');
$userInfo = $api->me->info();
```

You can create an instance without token, and later change it.
```
$api = Api::create();
$api->setToken('YOUR_TOKEN');
```

## API Resources

### Vacancies

View vacancy by id ([official docs](https://github.com/hhru/api/blob/master/docs/vacancies.md)):
```php
$vacancy = $api->vacancies->view($id);
```

Get similar vacancies for the current one ([official docs](https://github.com/hhru/api/blob/master/docs/vacancies.md#similar)):
```php
$similarVacancies = $api->vacancies->similar($id);
```

Get black listed vacancies ([official docs](https://github.com/hhru/api/blob/master/docs/blacklisted.md)):
```php
$blacklisted = $api->vacancies->blacklisted();
```

Get list of favorited vacancies ([official docs](https://github.com/hhru/api/blob/master/docs/vacancies.md#favorited)):
```php
$vacancies = $api->vacancies->favorited();

// with pagination
$vacancies = $api->vacancies->favorited(['page' => 2]);
```

Search ([official docs](https://github.com/hhru/api/blob/master/docs/vacancies.md#search)):
```php
$vacancies = $api->vacancies->search($params);
```

Vacancy statistics ([official docs](https://github.com/hhru/api/blob/master/docs/employer_vacancies.md#stats)):
```php
$stats = $api->vacancies->statistics($vacancyId);
```

Employer's active vacancies ([official docs](https://github.com/hhru/api/blob/master/docs/employer_vacancies.md#Список-опубликованных-вакансий)):
```php
$vacancies = $api->vacancies->active();

// you can specify a manager, by default uses current manager
$vacancies = $api->vacancies->active($managerId);
// with pagination
$vacancies = $api->vacancies->active($managerId, ['page'=>2]);
```

Employer's archived vacancies ([official docs](https://github.com/hhru/api/blob/master/docs/employer_vacancies.md#Архивация-вакансий)):

```php
$archived = $api->vacancies->archived();
// with pagination
$archived = $api->vacancies->archived(['page'=>2]);
```

Employer's hidden vacancies ([official docs](https://github.com/hhru/api/blob/master/docs/employer_vacancies.md#hidden)):

```php
$hidden = $api->vacancies->hidden();
// with pagination
$hidden = $api->vacancies->hidden(['page'=>2]);
```

Hide a vacancy ([official docs](https://github.com/hhru/api/blob/master/docs/employer_vacancies.md#hide)):

```php
$api->vacancies->hide($vacancyId);
```

Restore a vacancy ([official docs](https://github.com/hhru/api/blob/master/docs/employer_vacancies.md#restore)):

```php
$api->vacancies->restore($vacancyId);
```

### Employers

View employee by id ([official docs](https://github.com/hhru/api/blob/master/docs/employers.md#item)):
```php
$employee = $api->employers->view($id);
```

Search ([official docs](https://github.com/hhru/api/blob/master/docs/employers.md#search)):
```php
$employers = $api->employers->search($params);
```
### Employer Managers

Reference types and the rights of the manager ([official docs](https://github.com/hhru/api/blob/master/docs/employer_managers.md#dict)):
```php
$reference_type = $api->employers->getManagerTypes();
$reference_type = $api->employers->getManagerTypes($employerId);
```
When used without parameters your employer id will be automatically resolved from your profile

Get employer managers ([official docs](https://github.com/hhru/api/blob/master/docs/employer_managers.md#%D0%A1%D0%BF%D1%80%D0%B0%D0%B2%D0%BE%D1%87%D0%BD%D0%B8%D0%BA-%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%D0%BE%D0%B2-%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%BE%D0%B4%D0%B0%D1%82%D0%B5%D0%BB%D1%8F)):
```php
$managers = $api->employers->getManagers();
$managers = $api->employers->getManagers($employerId);
$managerWhoHasVacancies = $api->employers->getManagersWhoHasVacancies();
$managerWhoHasVacancies = $api->employers->getManagersWhoHasVacancies($employerId);
```
When used without parameters your employer id will be automatically resolved from your profile

Get manager information ([official docs](https://github.com/hhru/api/blob/master/docs/employer_managers.md#%D0%9F%D0%BE%D0%BB%D1%83%D1%87%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B8%D0%BD%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%86%D0%B8%D0%B8-%D0%BE-%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%D0%B5)):
```php
$managers = $api->employers->getManager($managerId);
$managers = $api->employers->getManager($managerId, $employerId);
```
When used without parameters your employer id will be automatically resolved from your profile

### Artifacts:

Get your photos ([official docs](https://github.com/hhru/api/blob/master/docs/artifacts.md)):
```php
$photos = $api->artifacts->photos();
```

Get your portfolio ([official docs](https://github.com/hhru/api/blob/master/docs/artifacts.md)):
```php
$portfolio = $api->artifacts->portfolio();
```

Delete photo by id ([official docs](https://github.com/hhru/api/blob/master/docs/artifacts.md)):
```php
$api->artifacts->deletePhoto($photoId);
```

Edit photo attributes ([official docs](https://github.com/hhru/api/blob/master/docs/artifacts.md)):
```php
$api->artifacts->editPhoto($photoId, $attributes);
```

Upload photo ([official docs](https://github.com/hhru/api/blob/master/docs/artifacts.md)):
```php
$api->artifacts->uploadPhoto('photo.jpg', 'my picture description');
```

Upload portfolio ([official docs](https://github.com/hhru/api/blob/master/docs/artifacts.md)):
```php
$api->artifacts->uploadPortfolio('portfolio.jpg', 'my portfolio description');
```

### User:

Get current user info ([official docs](https://github.com/hhru/api/blob/master/docs/me.md)):
```php
$info = $api->me->info();
```

Update name(last, first, middle). All parameters are required ([official docs](https://github.com/hhru/api/blob/master/docs/me.md#edit)):
```php
$api->me->editName($lastName, $firstName, $middleName);
```

Update flag 'is_in_search' ([official docs](https://github.com/hhru/api/blob/master/docs/me.md#Флаг-ищу--не-ищу-работу)):
```php
$isInSearch = true; // or false;
$api->me->setIsInSearch($isInSearch);
```

Manager preferences by managerId. You can get your manager id from user object,
returned from `$api->me->info()`. When used without parameters your manager id will be
automatically resolved from your profile ([official docs](https://github.com/hhru/api/blob/master/docs/manager_settings.md)).

```php
$me = $api->me->info();
$managerId = $me['manager']['id'];
$preferences = $api->manager->preferences($managerId);

// automatically get manager id from your profile
$preferences = $api->manager->preferences($managerId);
```

### Applicant comments

Get all comments about applicant ([official docs](https://github.com/hhru/api/blob/master/docs/applicant_comments.md#list)):
```php
$comments = $api->comments->view($applicantId);
```

Create a comment ([official docs](https://github.com/hhru/api/blob/master/docs/applicant_comments.md#add_comment)).
You need an applicant id, to create a comment. Applicant id can be received from resume:

```php
$resumeInfo = $api->resume->view($resumeId);
$applicantCommentsUrl = $resumeInfo['owner']['comments']['url']; // https://api.hh.ru/applicant_comments/2743747
// You need to parse id from this url

// Create a comment, that is visible for coworkers
$result = $api->comments($applicantId, 'my comment');

// Create a comment, that is visible only for you
$result = $api->createPrivate($applicantId, 'my comment');
```

Edit comment ([official docs](https://github.com/hhru/api/blob/master/docs/applicant_comments.md#edit_comment)):

```php
// Edit a comment, that is visible for coworkers
$api->comments->edit($applicantId, $commentId, 'new comment text')

// Edit a comment, that is visible only for you
$result = $api->editPrivate($applicantId, $commentId, 'new comment text');
```

Delete a comment ([official docs](https://github.com/hhru/api/blob/master/docs/applicant_comments.md#delete_comment)):

```php
$api->comments->delete($applicantId, $commentId);
```

### Industries
Get all industries ([official docs](https://github.com/hhru/api/blob/master/docs/industries.md)):
```php
$industries = $api->industries->all();
```

### Employee Negotiations

Get all negotiations ([official docs](https://github.com/hhru/api/blob/master/docs/negotiations.md#get_negotiations)):
```php
$negotiations = $api->negotiations->all();
```

Get only active negotiations ([official docs](https://github.com/hhru/api/blob/master/docs/negotiations.md#get_negotiations_active)):
```php
$negotiations = $api->negotiations->active();
```

View the list of messages.

- For employee: get messages of negotiation ([official docs](https://github.com/hhru/api/blob/master/docs/negotiations.md#get_messages)):
- For employer: view the list of messages in the response/invitation ([official docs](https://github.com/hhru/api/blob/master/docs/employer_negotiations.md#view-the-list-of-messages-in-the-responseinvitation)):
```php
$api->negotiations->messages($negotiationId);
// with pagination
$api->negotiations->messages($negotiationId, ['page'=>2]);
```

Sending new message.

- For employee: create a new message ([official docs](https://github.com/hhru/api/blob/master/docs/negotiations.md#send_message)):
- For employer: sending a message in the response/invitation ([official docs](https://github.com/hhru/api/blob/master/docs/employer_negotiations.md#sending-a-message-in-the-responseinvitation)):

```php
$api->negotiations->message($negotiationId, $messageText);
```

Git list of responses/invitation for ([official docs](https://github.com/hhru/api/blob/master/docs/employer_negotiations.md)):
```php
$responses = $api->negotiations->invited($vacancyId);
```

#### There are several types of invitations. For each of them you can pass a pagination array as a second argument:
Response
```php
$responses = $api->negotiations->invitedResponses($vacancyId);
// with pagination
$responses = $api->negotiations->invitedResponses($vacancyId, ['page'=>2]);
```

Consider
```php
$toConsider = $api->negotiations->invitedConsider($vacancyId);
```

Phone interview
```php
$phoneInterviews = $api->negotiations->invitedPhoneInterviews($vacancyId);
```

Assessments
```php
$assessments = $api->negotiations->invitedAssessments($vacancyId);
```

Interviews
```php
$interviews = $api->negotiations->invitedInterviews($vacancyId);
```

Offers
```php
$offers = $api->negotiations->invitedOffers($vacancyId);
```

Hired
```php
$hired = $api->negotiations->invitedHired($vacancyId);
```

Discard by employer
```php
$discard = $api->negotiations->invitedDiscardByEmployer($vacancyId);
```






View the response/invitation by id. NegotiationId can be taken from key url in the `invited` call response.
([official docs](https://github.com/hhru/api/blob/master/doc/employer_negotiations.md)):
```php
$response = $api->negotiations->view($negotiationId);
```

### Regions

Get all regions ([official docs](https://github.com/hhru/api/blob/master/docs/areas.md#areas)):
```php
$regions = $api->regions->all();
```

### Resumes

Get my resumes ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#mine)):
```php
$resumes = $api->resumes->mine();
```

View resume ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#item)):
```php
$views = $api->resumes->view($resumeId);
```

Edit resume ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#create_edit)):
```php
$api->resumes->edit($resumeId, ['first_name' => 'New name']);
```

Create a new resume ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#create_edit)):
```php
$attributes = ['first_name' => 'New name'];
$result = $api->resumes->create($attributes);
```

Views history ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#views)):
```php
$views = $api->resumes->views($resumeId);

// with pagination

$views = $api->resumes->views($resumeId, ['page'=>2]);
```

Negotiations history ([official docs](https://github.com/hhru/api/blob/master/docs/resume_negotiations_history.md)):
```php
$negotiations = $api->resumes->negotiations($resumeId);
// with pagination
$negotiations = $api->resumes->negotiations($resumeId, ['page' => 2]);
```

Update resume publish date ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#publish)):
```php
$api->resumes->publish($resumeId);
```

Get resume conditions ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#conditions)):
```php
$conditions = $api->resumes->conditions($resumeId);
```

Remove resume ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#delete)):
```php
$api->resumes->delete($resumeId);
```

Get current status (if it is blocked or ready to publish) ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#status-and-publication)):
```php
$status = $api->resumes->status($resumeId);
```

Get jobs recommendations for resume ([official docs](https://github.com/hhru/api/blob/master/docs/resumes.md#similar)):
```php
$jobs = $api->resumes->jobs($resumeId)

// with pagination
$jobs = $api->resumes->jobs($resumeId, ['page' => 2])
```

#### Resume visibility
[official docs](https://github.com/hhru/api/blob/master/doc_eng/resume_visibility.md)

Get resume black/white list:
```php
$blackList = $api->resumes->getBlackList($resumeId);
// ...
$whiteList = $api->resumes->getWhiteList($resumeId);
```

Add a company to black/white list:
```php
$api->resumes->addToBlackList($resumeId, $companyId);
// ...
$api->resumes->addToWhiteList($resumeId, $companyId);
```

Remove a company from black/white list:
```php
$api->resumes->removeFromBlackList($resumeId, $companyId);
// ...
$api->resumes->removeFromWhiteList($resumeId, $companyId);
```

Clear black/white list:
```php
$api->resumes->clearBlackList($resumeId);
// ...
$api->resumes->clearWhiteList($resumeId);
```

Search in black/white list:
```php
$companies = $api->resumes->searchInBlackList($resumeId, 'some-key-word');
//...
$companies = $api->resumes->searchInWhiteList($resumeId, 'some-key-word');
```

Search in black/white list:

### Saved searches:

List searches ([official docs](https://github.com/hhru/api/blob/master/docs/saved_search.md#vacancies-saved-search-list)):
```php
$searches = $api->savedSearches->all();
```

Get one search ([official docs](https://github.com/hhru/api/blob/master/docs/saved_search.md#vacancies-saved-search-item)):
```php
$searches = $api->savedSearches->view($searchId);
```

### Specializations

Get all specializations ([official docs](https://github.com/hhru/api/blob/master/docs/specializations.md)):
```php
$specializations = $api->specializations->all();
```

### Dictionaries

Get list of entities that are used in API ([official docs](https://github.com/hhru/api/blob/master/docs/specializations.md)):
```php
$dictionaries = $api->dictionaries->all();
```

### Suggests

Educational institutions ([official docs](https://github.com/hhru/api/blob/master/docs/suggests.md#Подсказки-по-названиям-университетов)):
```php
$suggests = $api->suggests->educational_institutions($text);
```

Companies ([official docs](https://github.com/hhru/api/blob/master/docs/suggests.md#companies)):
```php
$suggests = $api->suggests->companies($text);
```

Specialization ([official docs](https://github.com/hhru/api/blob/master/docs/suggests.md#specialization-suggestions)):
```php
$suggests = $api->suggests->fieldsOfStudy($text);
```

Key skills ([official docs](https://github.com/hhru/api/blob/master/docs/suggests.md#key-skills-suggestions)):
```php
$suggests = $api->suggests->skillSet($text);
```

Position ([official docs](https://github.com/hhru/api/blob/master/docs/suggests.md#position-suggestions)):
```php
$suggests = $api->suggests->positions($text);
```

Region ([official docs](https://github.com/hhru/api/blob/master/docs/suggests.md#region-tips)):
```php
$suggests = $api->suggests->areas($text);
```

Tips for vacancy search key words ([official docs](https://github.com/hhru/api/blob/master/docs/suggests.md#tips-for-vacancy-search-key-words)):
```php
$suggests = $api->suggests->vacancySearchKeyword($text);
```

## Metro
Obtaining all metro stations of all cities ([official docs](https://github.com/hhru/api/blob/master/docs_eng/metro.md)):
```php
$stations = $api->metro->all();
```

List of metro stations and lines in a specific city ([official docs](https://github.com/hhru/api/blob/master/docs_eng/metro.md)):
```php
$stations = $api->metro->forCity($cityId);
```

## Languages
Obtaining available languages ([official docs](https://github.com/hhru/api/blob/master/docs/languages.md)):
```php
$languages = $api->languages->all();
```

## Faculties
Get list of faculties of the educational institutions ([official docs](https://github.com/hhru/api/blob/master/docs/faculties.md)).
Uses institutionId that can be obtained from the suggestions for educational institutions.
```php
$faculties = $api->faculties->forInstitution($institutionId);
```

## Custom requests ([official docs](https://github.com/hhru/api/blob/master/docs/metro.md#list-of-metro-stations-and-lines-in-a-specific-city)):

### Locale
You can set a locale for your requests, the results will be returned in the selected locale. `RU` is set by
default ([official docs](https://github.com/hhru/api/blob/master/docs_eng/locales.md)):
```php
$api->setLocale('EN');

// chain methods
$api->setLocale('EN')
    ->me
    ->info();
```

### Host
Get data from different websites of the HeadHunter group.
([official docs](https://github.com/hhru/api/blob/master/docs_eng/hosts.md)):
```php
$api->setHost('hh.kz');

// chain methods
$api->setHost('hh.kz')
    ->me
    ->info();
```
