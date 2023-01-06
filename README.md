# Contagem de Assistencia para Reuniões pelo Zoom

- Este projeto tem como finalidade facilitar a contagem a identificação e o controle de convidados presentes em uma reunião via aplicativo Zoom.<br/>
- Ao acessar o endereço WEB enviado ao convidado, na tela principal "index" o convidado tem a opção de escolher se está em uma reunião presencial ou não.<br/> 

- Caso não esteja presente, clicando no botão "pelo zoom" o mesmo é direcionado a preencher um formulario informando seu nome e a quantidade de pessoas
que estão presentes com ele no mesmo ambiente.<br/>

- Após enviar o usuario é direcionado a pagina que contem as informações de ID e Senha da reunião pelo Zoom, e o acesso direto ao aplicativo por meio do
botão "Entrar na Reunião".<br/>

- Na pagina inicial no menu navbar, consta um botão para logar na area administrativa do sistema.<br/>
Logando na pagina admin o adminstrador tem acesso ao menu "sidebar".<br/>
Navegando pelo menu sidebar, no botão Zoom, temos acesso ao formulario onde informo o Link o ID e a Senha a ser salva no banco de dados.<br/>

- No menu sidebar no botão Assistencia, o adminstrador tem acesso a pagina com a lista de pessoas presentes informando o nome a quantidade e os botões 
para excluir e editar nesta lista.<br/>

- Na lista tem um campo data onde posso escolher analisar a assistencia em outras datas.<br/>

- Tambem tenho a informação do total de pessoas presentes.<br/>

- Para evidar duplicação de cadastro ao enviar as infomações de assistencia pelo usuario, seu IP é criptografado e armazenado no banco de dados.<br/>
 Ao clicar novamente no link direcionando a pagina inicial, o sistema cofere se consta esse IP conferindo o HASH no banco de dados.<br/>
 Sendo iguais o usuario é direcionado direto para a pagina contendo as informações para entrar na reunião sem duplicar dados no banco.<br/>
 Caso não tenha, confere tambem se o nome digitado no formulario é o mesmo que o nome salvo no banco de dados.<br/>
 Sendo iguais o usuario é direcionado para a pagina contendo as informações para entrar na reunião sem duplicar dados no banco.<br/>

# O sistema ainda está construção e passando por constantes melhorias.<br/>

# Linguagens de programação usadas<br/>

- HTML 5<br/>
- CSS<br/>
- Bootstrap<br/>
- JavaScript<br/>
- PHP<br/>
- Banco de dados MySQL<br/>
