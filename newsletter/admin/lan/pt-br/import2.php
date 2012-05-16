<?php

$lan = array(
   'import is not available' => 'importa&ccedil;&atilde;o n&atilde;o est&aacute; dispon&iacute;vel',
'The temporary directory for uploading (%s) is not writable, so import will fail' => 'O diret&oacute;rio tempor&aacute;rio para uploads (%s) n&atilde;o &eacute; grav&aacute;l, ent&atilde;o a importa&ccedil;&atilde;o falhar&aacute;',
'Invalid Email' => 'Email Inv&aacute;lido',
'Import cleared' => 'A Importa&ccedil;&atilde;o foi limpa',
'Continue' => 'Continuar',
'Reset Import session' => 'Reiniciar a sess&atilde;o de importa&ccedil;&atilde;o',
'File is either too large or does not exist.' => 'O arquivo &eacute; muito grande ou n&atilde;o existe.',
'No file was specified. Maybe the file is too big? ' => 'Nenhum arquivo foi especificado. Talvez o arquivos seja muito grande? ',
'File too big, please split it up into smaller ones' => 'O arquivo &eacute; muito grande, por favor divida-o em partes menores',
'Use of wrong characters in filename: ' => 'Uso incorreto de caracteres no nome do arquivo: ',
'Please choose whether to sign up immediately or to send a notification' => 'Por favor, escolha conectar imediatamente ou senviar uma notifica&ccedil;&atilde;o',
'Cannot read %s. file is not readable !' => 'N&atilde;o &eacute; poss&iacute;vel ler %s. O arquivo n&atilde;o &eacute; leg&iacute;vel !',
'Something went wrong while uploading the file. Empty file received. Maybe the file is too big, or you have no permissions to read it.' => 'Ocorreu algum erro durante o upload do arquivo. Foi recebido um arquivo vazio. Talvez o arquivos seja muito grande ou n&atilde;o tem permiss&atilde;o de leitura.',
'Reading emails from file ... ' => 'Lendo emails a partir do arquivo ... ',
'Error was around here &quot;%s&quot;' => 'O erros est&aacute; aqui &quot;%s&quot;',
'Illegal character was %s' => 'O caracter incorreto &eacute; %s',
'A character has been found in the import which is not the delimiter indicated, but is likely to be confused for one. Please clean up your import file and try again' => 'Um caracter foi encontrado durante a importa&ccedil;&atilde;o, o qual n&atilde;o &eacute; um delimitador indicado, mas est&acute; sendo confundido com um. Por favor, limpe o seu arquivo de importa&ccedil;&atilde;o e tente novamente',
'ok, %d lines' => 'ok, %d linhas',
'Cannot find column with email, please make sure the column is called &quot;email&quot; and not eg e-mail' => 'N&atilde;o foi poss&iacute;vel encontrar a coluna de email, por favor, certifique-se que a coluna est&acute; nomeada como &quot;email&quot; e n&atilde;o, por exemplo, e-mail',
'Create new one' => 'Criar nova',
'Skip Column' => 'Ignorar Coluna',
'Import Attributes' => 'Importar Atributos',
'Continue' => 'Continuar',
'Please identify the target of the following unknown columns' => 'Por favor, identificar as seguinte colunas desconhecidas',
'Summary' => '&Iacute;ndice',
'maps to' => 'maps to',
'Create new Attribute' => 'Criar novo Atributo',
'maps to' => 'maps to',
'Skip Column' => 'Ignorar Coluna',
'maps to' => 'maps to',
'%d lines will be imported' => '%d linhas ser&atilde;o importadas',
'Confirm Import' => 'Confirmar Importa&ccedil;&atilde;o',
'Test Output' => 'Testar Resultados',
'Record has no email' => 'N&atilde;o existe nenhum email no registro',
'Invalid Email' => 'Email Inv&aacute;lido',
'clear value' => 'Limpar Valores',
'New Attribute' => 'Novo Atributo',
'Skip value' => 'Ignorar Valor',
'duplicate' => 'duplicatar',
'Duplicate Email' => 'Duplicatar Email',
' user imported as ' => ' usu&aacute;rio importado como ',
'duplicate' => 'duplicatar',
'duplicate' => 'duplicatar',
'Duplicate Email' => 'Duplicatar Email',
'All the emails already exist in the database and are member of the lists' => 'Todos os emails j&acute; existem na base de dados e s&atilde;o membros de listas',
'%s emails succesfully imported to the database and added to %d lists.' => '%s emails foram importados com sucesso e adicionados em %d listas.',
'%d emails subscribed to the lists' => '%d emails foram inscritos nas listas',
'%s emails already existed in the database' => '%s emails j&aacute; existem no banco de dados',
'%d Invalid Emails found.' => '%d Emails inv&aacute;lidos foram encontrados.',
'These records were added, but the email has been made up from ' => 'These records were added, but the email has been made up from ',
'These records were deleted. Check your source and reimport the data. Duplicates will be identified.' => 'Estes registros forma apagados. Verifique a fonte e reimporte os dados. As duplicatas ser&atilde;o identificadas.',
'User data was updated for %d users' => 'Os dados de %d usu&aacute;rios foram atualizados',
'%d users were matched by foreign key, %d by email' => '%d usu&aacute;rios foram encontrados atrav&eacute;s de uma chave externa, %d por email',
'phplist Import Results' => 'Resultado da importa&ccedil;&atilde;o phplist',
'Test output<br/>If the output looks ok, click %s to submit for real' => 'Testar resultados<br/>Se o resultado parece correto, clique em %s para envi&aacute;-lo de fato',
'Confirm Import' => 'Confirmar Importa&ccedil;&atilde;o',
'Import some more emails' => 'Importar mais alguns emails',
'Adding users to list' => 'Adicionando usu&aacute;rios &agrave; lista',
'Select the lists to add the emails to' => 'Selecione as listas nas quais adicionar&aacute; emails',
'No lists available' => 'N&atilde;o foi encontrada nenhuma lista',
'Add a list' => 'Adicionar lista',
'Select the groups to add the users to' => 'Selecione os grupos nos quais se quer adicionar usu&aacute;rios',
'automatically added' => 'automaticamente adicionado',
 'importintro' => '<p class="information">O arquivo que foi enviado necessitam os atributos do registro em sua primeira linha.
    Assegure-se que a coluna do email est&aacute; nomeada "email" e n&atilde;o outro nome como "e-mail" ou           "Endere&ccedil;o de Email"
N&atilde;o importa se est&aacute; em mai&uacute;sculas ou min&uacute;sculas.
    </p>
    If you have a column called "Foreign Key", this will be used for synchronisation between an
    external database and the PHPlist database. The foreignkey will take precedence when matching
    an existing user. This will slow down the import process. If you use this, it is allowed to have
    records without email, but an "Invalid Email" will be created instead. You can then do
    a search on "invalid email" to find those records. Maximum size of a foreign key is 100.
    <br/><br/>
    <b>Aten&ccedil;&atilde;o</b>: o arquivo deve ser tipo texto. N&atilde;o fazer o upload de arquivos como documentos Word.
    <br/>',
'uploadlimits' => 'Os seguintes limites s&atilde;o estabelecidos pelo seu servidor:<br/>
Maximum size of a total data sent to server: <b>%s</b><br/>
Maximum size of each individual file: <b>%s</b>
<br/>PHPlist will not process files larger than 1Mb',
'testoutput_blurb' => 'If you check "Test Output", you will get the list of parsed emails on screen, and the database will not be filled with the information. This is useful to find out whether the format of your file is correct. It will only show the first 50 records.',
'warnings_blurb' => 'Se voc&ecirc; verificar "Mostar Alertas", voc&ecirc; ver&aacute; os alertas sobre registros inv&aacute;lidos. Os alertas s&oacute; ser&atilde;o exibilidos se voc&ecirc; acionar o "Testar Resultados". Eles ser&atilde;o ignorados durante a importa&ccedil;&atilde;o final. ',
'omitinvalid_blurb' => 'If you check "Omit Invalid", invalid records will not be added. Invalid records are records without an email. Any other attributes will be added automatically, ie if the country of a record is not found, it will be added to the list of countries.',
'assigninvalid_blurb' => 'Assign Invalid will be used to create an email for users with an invalid email address.
You can use values between [ and ] to make up a value for the email. For example if your import file contains a column "First Name" and one called "Last Name", you can use
"[first name] [last name]" to construct a new value for the email for this user containing their first name and last name.
The value [number] can be used to insert the sequence number for importing.',
'overwriteexisting_blurb' => 'If you check "Overwrite Existing", information about a user in the database will be replaced by the imported information. Users are matched by email or foreign key.',
'retainold_blurb' => 'If you check "Retain Old User Email", a conflict of two emails being the same will keep the old one and add "duplicate" to the new one. If you don\'t check it, the old one will get "duplicate" and the new one will take precedence.',
'sendnotification_blurb' => 'If you choose "send notification email" the users you are adding will be sent the request for confirmation of subscription to which they will have to reply. This is recommended, because it will identify invalid emails.',
'phplist Import  Results' => 'phplist Import  Results',
'File containing emails' => 'Arquivo contendo emails',
'Field Delimiter' => 'Campo Delimitador',
'(default is TAB)' => '(o padr&atilde;o &eacute; TAB)',
'Record Delimiter' => 'Gravar Delimitador',
'(default is line break)' => '(o padr&atilde;o &eacute; quebra de linha)',
'Test output' => 'Testar Resultados',
'Show Warnings' => 'Mostrar Alertas',
'Omit Invalid' => 'Omitir Inv&aacute;lidos',
'Assign Invalid' => 'Assinatura Inv&aacute;lida',
'Overwrite Existing' => 'Sobrescrever Existente',
'Retain Old User Email' => 'Retain Old User Email',
'Send&nbsp;Notification&nbsp;email' => 'Enviar&nbsp;Notifica&ccedil;&atilde;o&nbsp;email',
'Make confirmed immediately' => 'Confirmar Imediatamente',
'Import' => 'Importar',


);
?>
