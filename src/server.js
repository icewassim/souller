const express = require('express'),
  consolidate = require('consolidate'),
  path = require('path'),
  fs =  require('fs'),
  app = express();

var port = process.env.PORT || 3000;
app.engine('html', consolidate.handlebars);
app.use('/pics', express.static(__dirname + '/assets/pics'));

app.use('/js', express.static(__dirname + '/../dist'));
app.use('/css', express.static(__dirname + '/../dist'));
app.use('/bower', express.static(__dirname + '/../bower_components'));
app.use('/components', express.static(__dirname + '/../src/app/components'));
app.use('/mocks', express.static(__dirname + '/../.tmp'));
app.use('/pictures', express.static(__dirname + '/../pictures'));

app.use('/bootstrap', express.static(__dirname + '/../bower_components/bootstrap/dist'));
app.use('/jquery', express.static(__dirname + '/../bower_components/jquery/dist'));
app.use('/css', express.static(__dirname + '/css'));
app.use('/preview-icons', express.static(__dirname + '/icons'));
app.set('view engine', 'html');

app.set('views', __dirname + '/assets/views');


app.listen(port, function(err) {
  if (err) {
    console.error('Failure while openinig port ', port);
  }
  console.log('listenting to port ', port);
});

app.get('/', function(req, res) {
  res.status(200).render('index');
});
