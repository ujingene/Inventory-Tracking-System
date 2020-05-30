This is an inventory Management system for tracking inventory items. Its built using Vanilla PHP and Vanilla Javascript. It persist data to Mysql Database. The available functions from the system are.

- Beautifully crafted Items Dashboard
- login/Registraion Interface
- Two session types (User and Admin)
- User can check Items owned and can request service from the administrator
- Admin can perfomr the following
    - **Create New,  Edit,  Delete Employees**
    - **Add, Delete, Edit Inventory**
    - **View items Report (Assigned and Available Inventory)**
    - **Add, Edit and Delete Roles/Positions**
    - **View All Departments**
    - **Manage all User Requests**

### Required Development Environment. 

```
Ensure you have Apache2, Mysql/PostgressQl Installed and running
If on Windows install Xampp which comes prebundled with apache2 and Mysql
```

### Clone the App from github
```
https://github.com/ujingene/Inventory-Tracking-System.git
```
Copy the Root Project folder inside `htdocs` in Xampp folder
Import the Database file to your db.

Change the connection string in database/Connection.php

```php
public function __construct($username="_user67_", $password="2@13847", $host="localhost", $dbname="TestDb", $options = []){
		
		$this->isConn = TRUE;
		try{
			$this->datab = new PDO("mysql:host={$host};  dbname={$dbname}; charset=utf8", $username, $password, $options);
			$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->transaction = $this->datab;
			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			throw new Exception($e->getMessage());			
		}

	}
```

### Run App
Open [http://localhost](http://localhost/PSA2) to view it in the browser.

## Application Info

### Author

Eugene Wanjira
[Eugene Wanjira](http://www.github.com/ujingene)

### Version

1.0.0

### License

This project is licensed under the MIT License