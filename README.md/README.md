## Livre d'or 

- on aura une page avec formulaire 
 - un champs pour le  nom d'utilisateur
 - un champs message
 - un button 
 (le formulaire devra etre valide et on acceptera pas le pseudo de moins de 3 caracteres ni le message de moins de 10 caracteres )
- on creera un fichier "message" qui contiendra un message par ligne 
(on utilisera serialize les message on utilisera les fonctions Json_encode (tableau)　et Json_decode(tableau, true)) 
- la page devra afficher tous les messages sous formulaire formate  de la maniere suivantes 

<p>
    <strong>Pseudo</strong><em>le 03/12/2009 a 12h00</em><br>
    Le message
</p>
les sauts de ligne devront etre conserves n12br)


## Restriction 

- Utiliser une classe pour representer un messsage ,
   
   - new Message (string $username , string $message , DateTime)
   - isValid() : bool
   - getErrors() : array 
   - toHTML(): string
   - toJSON(): string