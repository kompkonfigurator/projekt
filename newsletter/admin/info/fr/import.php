
<p>

<h3>Importer des adresses email dans des listes pr&eacute;-existantes</h3>

Il y a quatre m&eacute;thodes pour importer des donn&eacute;es pr&eacute;-existantes:

<ul>
<li><?php echo PageLink2("import2","Importer des adresses email avec des attributs diff&eacute;rents de votre syst&egrave;me");?>. La liste d&rsquo;emails peut contenir des attributs qui ne sont pas encore d&eacute;finis.  Ils seront cr&eacute;&eacute;s automatiquement comme des attributs "textline", c&rsquo;est-&agrave;-dire un champ texte. Utilisez cette option si vous importez d&rsquo;un fichier CSV ou d&rsquo;un tableur, en veillant &agrave; mettre les attributs dans les colonnes, un utilisateur par ligne, et l&rsquo;email des utilisateurs dans la premi&egrave;re colonne (ce qui correspond au premier attribut). <br/><br/>
<li><?php echo PageLink2("import1","Importer des adresses email avec les m&ecirc;mes valeurs et attributs que votre syst&egrave;me");?>. La liste d&rsquo;emails devra correspondre &agrave; la structure que vous avez d&eacute;j&agrave; cr&eacute;&eacute; dans <?php echo NAME?>. Utilisez cette option si vous importez une simple liste d&rsquo;emails. Vous pouvez ensuite sp&eacute;cifier les valeurs des attributs dans chaque dossier. Les valeurs par d&eacute;faut seront les m&ecirc;mes pour tous les emails que vous importerez.<br/><br/>
<li><?php echo PageLink2("import3","Importer des adresses emails d&rsquo;un compte IMAP");?>. Cette option va chercher des emails dans vos dossier IMAP et les ajouter &agrave; votre liste.  Seul le Nom de la personne pourra &ecirc;tre r&eacute;cup&eacute;r&eacute; comme attribut.<br/><br/>
<li><?php echo PageLink2("import4","Importer des adresses email d&rsquo;une autre base de donn&eacute;es");?>.
</ul>

</p>
