<?php
$lan = array(
  'File is either to large or does not exist.' => 'El fichero es demasiado grande, o bien no existe.',
  'No file was specified.' => 'No se especific&oacute; ning&uacute;n fichero.',
  'Some characters that are not valid have been found. These might be delimiters. Please check the file and select the right delimiter. Character found:' => 'Se han encontrado caracteres no v&aacute;lidos. Tal vez sean delimitadores. Compruebe el fichero y seleccione el delimitador adecuado. Car&aacute;cter encontrado:',
  'Name cannot be empty' => 'El nombre no puede estar en blanco',
  'Name is not unique enough' => 'Este nombre ya est&aacute; en uso',
  'Cannot find the email in the header' => 'No se puede encontrar el
  email en la cabecera',
  'Cannot find the password in the header' => 'No se puede encontrar
  la contrase&ntilde;a en la cabecera',
  'Cannot find the loginname in the header' => 'No se puede encontrar el
  nombre de usuario en la cabecera',
  'Record has no email' => 'El registro no tiene email',
  'Invalid Email' => 'Email  no v&aacute;lido',
  'Record has more values than header indicated, this may cause
  trouble' => 'El registro contiene m&aacute;s valores de los que
  indicaba la cabecera, esto puede causar problemas',
  'password' => 'contrase&ntilde;a',
  'loginname' => 'nombre de usuario',
  'Empty loginname, using email:' => 'nombre de usuario en blanco, se
  usar&aacute; el email:',
  'Value' => 'Valor',
  'added to attribute' => 'a&ntilde;adido al atributo',
  'new email was' => 'el nuevo email era',
  'new emails were' => 'los nuevos emails eran',
  'email was' => 'el email era',
  'emails were' => 'los emails eran',
  'All the emails already exist in the database' => 'todos los emails estaban ya en la base de datos',
  'succesfully imported to the database and added to the system.' =>
  'importado a la base de datos y a&ntilde;adido al sistema.',
  'Import some more emails' => 'Importar m&aacute;s emails',
  'No default permissions have been defined, please create default
  permissions first, by creating one dummy admin and assigning the
  default permissions to this admin' => 'No se han definido permisos
  por defecto. Cree los permisos por defecto en primer lugar, creando
  un administrador ficticio y asignando los permisos por defecto a este administrador',
  
  # do not translate email, loginname and password
  'importadmininfo' => '
  El fichero debe contener los datos de los administradores que quiere
  a&ntilde;adir al sistema. Las columnas deben ir en el siguiente
  orden: <b>email</b>, <b>loginname</b> (nombre de usuario),
  <b>password</b> (contrase&ntilde;a). El conternido de cualquier otra
  columna ser&aacute; inclu&iacute;do como atributo del
  administrador correspondiente.
 <b>Atenci&oacute;n</b>: El fichero debe estar en texto plano. No
  cargue ficheros binarios, como lo son por ejemplo los documentos Word.',
  'File containing emails' => 'Fichero que contiene los emails',
  'Field Delimiter' => 'Delimitador de campos',
  'Record Delimiter' => 'Delimitador de registros',
  'importadmintestinfo' => 'Si marca la casilla &#171;Probar salida&#187;
  ver&aacute; la lista de emails procesados en pantalla, pero la base
  de datos no recibir&aacute; la informaci&oacute;n. Esta
  funci&oacute;n puede ser &uacute;til para comprobar si el formato de
  su fichero es correcto. Solo mostrar&aacute; los primeros 50 registros.',
  # this should be the same as the term between quotes in the previous one
  'Test output' => 'Probar salida',
  'Check this box to create a list for each administrator, named after
  their loginname' => 'Marque esta casilla para crear una lista por
  administrador, cuyo nombre ser&aacute; el nombre de usuario del
  administrador correspondiente.',
  'Do Import' => 'Importar',
  'default is TAB' => 'por defecto es TAB',
  'default is line break' => 'por defecto es el salto de l&iacute;nea',
  'testoutputinfo' => 'Probar salida:<br/>Solo debe haber UN email por
  l&iacute;nea.<br/>Si la salida parece estar bien, ir <a
  href="javascript:history.go(-1)">atr&aacute;s</a> para procesar de verdad<br/><br/>',  
  'List for' => 'Lista para',
  'login' => 'conectarse',
  
  
);
?>