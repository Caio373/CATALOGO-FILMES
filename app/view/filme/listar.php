<?php

require_once __DIR__ ."\..\..\model\Filme.php";

$filmeModel = new Filme();
$filmes = $filmeModel->findAll();

?>

<table border="1">
    <thead>
        <th>Nome</th>
        <th>Ano</th>
        <th>Descrição</th>
        <th>Ação</th>
    </thead>
    <tbody>
        <?php foreach( $filmes as $filme) {?>
           <tr>
            <td><?php echo $filme->nome?></td>
            <td><?php echo $filme->ano?></td>
            <td><?php echo $filme->descricao?></td>
            <td>
                <form action="visualizar.php" method="GET">
                    <input type="hidden" name="id" value="<?= $filme->id; ?>">
                    <button title="detalhes">
                        <span class="material-symbols-outlined">
                            detalhes
                        </span>
                    </button>
                </form>
                <!--Funcionalidade de deletar-->
                <form action="excluir.php" method="POST">
                    <input type="hidden" name="id" value="<?= $filme->id; ?>">
                    <button title="excluir" onclick="return confirm('Tem certeza que quer excluir?')">
                        <span class="material-symbols-outlined">
                            Excluir
                        </span>
                    </button>
                </form>
            </td>
           </tr>
        <?php }?>
    </tbody>
</table> 
<!-- // echo"<tr>";
            // echo"<td>".$filme["nome"]."</td>";
            // echo"<td>".$filme["ano"]."</td>";
            // echo "<td>".$filme["descricao"]."</td>";
            // echo"</tr>"; -->