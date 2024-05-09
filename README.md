# Backend-VCI_Admin
Prototipo de Backend realizado con PHP para proyecto VCI_Admin realizado con Angular y el script de prueba de la base de datos SQL.

## Development server

Run `xampp` aplication or server Online. Navigate to `http://localhost/Backend_VCI_Admin/conection.php`. The file will automatically make the conection to server and DB.

### How to start

**Note** that this seed project requires **node >=v12.0.0 and npm >=6**, previously to download the Angular project VCI_Admin from repository `https://github.com/Zheykan/vci_admin.git`.

In order to start the project use:

```bash
$ git clone https://github.com/Zheykan/Backend-VCI_Admin.git
$ cd Backend_vci_admin
# execute `xampp` aplication
# upload vci_admin BD with phpmyadmin
$ Run url `http://localhost/Backend_VCI_Admin/conection.php`
# watches your files and uses by default run `http://localhost/Backend_VCI_Admin/Controller/"controller name".php?control="function name"` for a test controller.
# the produced code can be deployed (rsynced) to a remote server.
```

## Available Functions for all Controllers.

Run function `consulta` to generate a new query. You can see all recors of this Class table.

Run function `insertar` to generate a new query. You can see how a test record is inserted in this Class table.

Run function `editar` to generate a new update query. You can see how is modificate the previous test record in this Class table, require a primary key **"id"** to make the update.

Run function `filtrar` to generate a new query. You can see how how it does a filtering of records of this Class table. Each Class controller uses different types of data to perform the query, using the **"valor"** variable. For more information, consult the classes in the folder `./Backend_vci_admin/Model/"name of model".php`.

Run function `eliminar` to generate a new delete query. You can see how a test record is deleted from the Class table, require uses a primary key **"id"** to delete.


