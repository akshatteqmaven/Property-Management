<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>
    <!-- <?= $this->Html->script(['form', 'jquery', 'validate']) ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

    <?= $this->element('flash/navbar'); ?>


    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        var csrfToken = $('meta[name="csrfToken"]').attr('content');
    </script>

    <script>
        $('#test').on('change', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
                }
            });

            var data = $(this).val();
            // alert(data);
            $.ajax({
                url: "http://localhost:8765/users-profile/index",
                data: {
                    'status': data
                },
                type: "json",
                method: "get",
                success: function(response) {
                    // code will work in case of json retun from the ajax start here
                    // res = JSON.parse(response);
                    // var tabel_html = '<table><thead><tr><th>id</th><th>name</th><th>email</th><th>image</th><th>created_at</th><th> Actions</th></tr></thead>';
                    // tabel_html += '<tbody>';
                    // $.each(res, function (key, val) {
                    //         tabel_html += '<tr><td>'+val.id+'</td><td>'+val.name+'</td><td>'+val.email+'</td><td></td><td></td><td class="actions"></td></tr>';

                    // })
                    // tabel_html +='</tbody>';
                    // tabel_html +='</table>';
                    // $('.table-responsive').html(tabel_html);
                    // code will work in case of json retun from the ajax end here

                    // code will work in case cakephp element render start here \
                    $('.table-responsive').html(response);
                    // code will work in case cakephp element render end here 
                }
            });
        });
    </script>

</body>

</html>