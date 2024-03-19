define(function( require ){

  require('handlebars');
  var environment = {"envName":"wpeprod","appRoot":"/wfc2/esp/","api":{"responsessURL":"//data.watercalculator.org:8443/wfc-api/responses.php","subscriptionsURL":"//data.watercalculator.org:8443/wfc-api/subscriptions.php"}};

  Handlebars.registerHelper('appRoot', function(){
    return environment.appRoot;
  });

  return environment;
});
