//Global Variables
var  app = angular.module('HitMan',['ngRoute', 'ngAnimate']);

app.controller('AssassinControler', function($scope, $rootScope) {

   //Variables
   $scope.orderList = "name";
   $scope.skill_require = "";
   $scope.coreSkill = appData.CORE_SKILLS;
   $scope.projects = appData.PROJECTS;
   $scope.opeSourceProjects = appData.OPEN_SOURCE;
   $scope.socialMedia = appData.SOCIAL;
   $scope.projectCount =  $scope.projects.length;
   $scope.isSkillPresent= function(skillPresent){
     if($scope.skill_require !== "" && skillPresent.indexOf($scope.skill_require) !== -1)
    { return "glow"}
    else
    {return "";}
   }
});

app.config(function($routeProvider, $locationProvider){

$routeProvider
.when("/", {
 templateUrl : "./templates/visitors.html",
})
.when('/visitors',{
templateUrl : "./templates/visitors.html",
animation: 'first',

})
.when('/form',{
templateUrl : "./templates/form.html",
animation: 'second',
})
.when('/report',{
templateUrl : "./templates/report.html",
animation: 'first',
})
.when('/about',{
templateUrl : "./templates/about.html",
animation: 'first',
})
.otherwise({
template: "<div class='box n'>Well... Hello There</div>",
animation: 'welcome'
});
});
