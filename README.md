# Contagem de Assistência para Reuniões pelo Zoom

- Este projeto tem como finalidade facilitar a contagem a identificação e o controle de convidados presentes em uma reunião via aplicativo Zoom.<br/>
- Ao acessar o endereço WEB enviado ao convidado, na tela principal "index" o convidado tem a opção de escolher se está em uma reunião presencial ou não.<br/> 

- Caso não esteja presente, clicando no botão "pelo zoom" o mesmo é direcionado a preencher um formulário informando seu nome e a quantidade de pessoas
que estão presentes com ele no mesmo ambiente.<br/>

- Após enviar o usuário é direcionado a página que contém as informações de ID e Senha da reunião pelo Zoom, e o acesso direto ao aplicativo por meio do
botão "Entrar na Reunião".<br/>

- Na página inicial no menu navbar, consta um botão para logar na área administrativa do sistema.<br/>
Logando na página admin o administrador tem acesso ao menu "sidebar".<br/>
Navegando pelo menu sidebar, no botão Zoom, temos acesso ao formulário onde informo o Link o ID e a Senha a ser salva no banco de dados.<br/>

- No menu sidebar no botão Assistência, o administrador tem acesso a página com a lista de pessoas presentes informando o nome a quantidade e os botões 
para excluir e editar nesta lista.<br/>

- Na lista tem um campo data onde posso escolher analisar a assistência em outras datas.<br/>

- Também tenho a informação do total de pessoas presentes.<br/>

- Para envidar duplicação de cadastro ao enviar as informações de assistência pelo usuário, seu IP é criptografado e armazenado no banco de dados.<br/>
 Ao clicar novamente no link tendo acesso a página inicial, o sistema confere se consta esse IP conferindo o HASH no banco de dados.<br/>
 Sendo iguais, o usuário é direcionado direto para a página contendo as informações para entrar na reunião sem duplicar dados no banco.<br/>
 Caso o IP tenha mudado, e a sessão tenha sido perdida no navegador o usuário é direcionado a preencher novamente o formulário, 
 que confere também se o nome digitado é o mesmo que o nome salvo no banco de dados.<br/>
 Sendo iguais o usuário é direcionado para a página contendo as informações para entrar na reunião sem duplicar dados no banco.<br/>
 
 - O sistema passa por esse processo de tratamento para que não haja duplicação de dados caso outros usuários estando na mesma rede duplique informações<br/>

# O sistema ainda está construção e passando por constantes melhorias.<br/>

# Linguagens de programação usadas<br/>

- HTML 5<br/>
- CSS<br/>
- Bootstrap<br/>
- JavaScript<br/>
- PHP<br/>
- Banco de dados MySQL<br/>
