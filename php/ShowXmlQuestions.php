<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src = "../js/jquery-3.4.1.min.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div>   
        <table border = '1'>
            <tr>
                <th>Autor</th>
                <th>Enunciado</th>
                <th>Respuesta correcta</th>
            </tr>
            <?php $xml = simplexml_load_file('../xml/Questions.xml'); ?>
            <?php foreach ($xml->xpath('assessmentItem') as $assessmentItem): ?>
            <tr>
                <td><?php echo $assessmentItem->attributes()->author; ?></td>
                <td><?php echo $assessmentItem->itemBody->p; ?></td>
                <td><?php echo $assessmentItem->correctResponse->value; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>