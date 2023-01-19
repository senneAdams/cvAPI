<?php

require_once 'db.php';

class Data extends db
{
    private array $result;

    public function __construct()
    {
        parent::__construct();
    }

    public function getData(){

        $combined = [];
      $profileData = $this->queryHandler('select profileName,profileSubTitle,profileDescr from profile',true,false,false);
      $combined['profile'] = $profileData;

      $experienceData = $this->queryHandler('select experienceName,experienceTitle,experienceDescr,dateFromTo from experience',true,false,true);
      $combined['experience'] = $experienceData;

      $skillData = $this->queryHandler('select skillDescr from skills',true,false,true);
      $combined['skills'] = $skillData;

      $technicalData = $this->queryHandler('select technicalTitle,technicalDescr from technical',true,false,true);
      $combined['technical'] = $technicalData;

      $educationData = $this->queryHandler('select educationTitle,educationSchool,dateFromTo from education',true,false,true);
      $combined['education'] = $educationData;

      return $this->result = $combined;
    }

}

?>