<!DOCTYPE html>
<html>
	<head>
		<title>{{ title }}</title>
                <link rel='stylesheet' href=/style.css>
	</head>
	<body>            
	<div class='cap'>
            {{ header }}
	</div>                
      <div class='main'>
        <div class='sidebar'>
            sidebar
        </div>
        <div class='content'>
            {{ content }}
        </div>
          <div class='control'>
              {{ control }}
          </div>    
      </div>
      
	<div class='footer'>
		{{ footer }}
	</div>
	</body>
</html>