<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="template.css">
    <title>Jeoparody</title>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.game .tile').one('click', function() {
                var points = parseInt($(this).data('points'));
                var answer = $(this).data('answer');
                $('.question').show();
                $('.award, .showanswer').show();
                $('.question .text').text($(this).data('question'));
                $('.award').click('click', function() {
                    var money = $('.' + $(this).data('player') + '-score');
                    var pointsScored = points;
                    var isWrong = $(this).hasClass('wrong');
                    if (isWrong) {
                        pointsScored *= -1;
                        $('.award').removeClass('wrong');
                    }
                    money.data('score', money.data('score') + pointsScored);
                    money.text((money.data('score') < 0 ? '-' : '') + '$' + Math.abs(money.data('score')));
                    if (!isWrong) {
                        $('.showanswer').click();
                    }
                });
                $('.showanswer').one('click', function() {
                    $('.award, .showanswer').off('click').hide();
                    $('.question .text').text(answer)
                        .one('click', function() {
                            $('.question').hide();
                        });
                });
                $(this).removeClass('tile').removeClass('dd').text('');
            });
            $('.player').blur(function() {
                $('.' + $(this).data('player') + '-name').text($(this).text());
            });
            $(document).keydown(function(event) {
                if (event.shiftKey) $('.question .award').addClass('wrong');
            });
<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="template.css">
    <title>Jeoparody</title>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.game .tile').one('click', function() {
                var points = parseInt($(this).data('points'));
                var answer = $(this).data('answer');
                $('.question').show();
                $('.award, .showanswer').show();
                $('.question .text').text($(this).data('question'));
                $('.award').click('click', function() {
                    var money = $('.' + $(this).data('player') + '-score');
                    var pointsScored = points;
                    var isWrong = $(this).hasClass('wrong');
                    if (isWrong) {
                        pointsScored *= -1;
                        $('.award').removeClass('wrong');
                    }
                    money.data('score', money.data('score') + pointsScored);
                    money.text((money.data('score') < 0 ? '-' : '') + '$' + Math.abs(money.data('score')));
                    if (!isWrong) {
                        $('.showanswer').click();
                    }
                });
                $('.showanswer').one('click', function() {
                    $('.award, .showanswer').off('click').hide();
                    $('.question .text').text(answer)
                        .one('click', function() {
                            $('.question').hide();
                        });
                });
                $(this).removeClass('tile').removeClass('dd').text('');
            });
            $('.player').blur(function() {
                $('.' + $(this).data('player') + '-name').text($(this).text());
            });
            $(document).keydown(function(event) {
                if (event.shiftKey) $('.question .award').addClass('wrong');
            });
            $(document).keyup(function(event) {
                $('.question .wrong').removeClass('wrong');
            });
        });
    </script>
</head>

<body>
    <table class="game">
        <thead class="name">
            <tr>
                <?php foreach ($game['categories'] as $category) : ?>
                    <th><?php echo $category['name'] ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody class="qmoney">
            <?php $randint = rand(0, 4) . rand(0, 4) ?>
            <?php for ($row = 0; $row < 5; $row++) : ?>
                <?php $points = ($row + 1) * $game['pointScale'] ?>
                <tr>
                    <?php for ($col = 0; $col < 5; $col++) : ?>
                        <?php $data = $game['categories'][$col]['questions'][$row]; ?>
                        <?php $class = ($randint === $row . $col) ? 'tile dd' : 'tile' ?>
                        <td class="<?php echo $class ?>" data-points="<?php echo $points ?>" data-question="<?php echo htmlentities($data['question'], ENT_QUOTES, 'UTF-8'); ?>" data-answer="<?php echo htmlentities($data['answer'], ENT_QUOTES, 'UTF-8'); ?>">$<?php echo $points ?></td>
                    <?php endfor ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    <table class="question">
        <tr>
            <td class="text ctext" colspan="7">QUESTION</td>
        </tr>
        <tr class="name">
            <td class="award p1-name" colspan="1" data-player="p1">Player 1</td>
            <td class="award p2-name" colspan="1" data-player="p2">Player 2</td>
            <td class="award p3-name" colspan="1" data-player="p3">Player 3</td>
            <td class="award p4-name" colspan="1" data-player="p4">Player 4</td>
            <td class="showanswer" colspan="1">&#9760;</td>
        </tr>
    </table>
    <table class="scores">
        <tr class="name">
            <th><span class="player" data-player="p1" contenteditable="true">Player 1</span></th>
            <th><span class="player" data-player="p2" contenteditable="true">Player 2</span></th>
            <th><span class="player" data-player="p3" contenteditable="true">Player 3</span></th>
            <th><span class="player" data-player="p4" contenteditable="true">Player 4</span></th>
        </tr>
        <tr class="money">
            <td class="p1-score" data-score="0">$0</td>
            <td class="p2-score" data-score="0">$0</td>
            <td class="p3-score" data-score="0">$0</td>
            <td class="p4-score" data-score="0">$0</td>
        </tr>
    </table>
					</body>
</html>
