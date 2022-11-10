<?php include 'func/header.php';?>

<a href="mbti.php">이전으로</a>

<?php
$mbti = $_GET['mbti'];
$mbti = strtolower($mbti);
$contents = '';

switch ($mbti){
    case 'intj': $contents = '모든 일에 대해 계획을 세우며 상상력이 풍부한 전략가'; break; 
    case 'intp': $contents = '지식을 끝없이 갈망하는 혁신적인 발명가'; break; 
    case 'entj': $contents = '항상 문제 해결 방법을 찾아내는 성격으로, 대담하고 상상력이 풍부하며 의지가 강력한 지도자'; break; 
    case 'entp': $contents = '지적 도전을 즐기는 영리하고 호기심 많은 사색가'; break; 
    
    case 'infj': $contents = '차분하고 신비한 분위기를 풍기는 성격으로, 다른 사람에게 의욕을 불어넣는 이상주의자'; break; 
    case 'infp': $contents = '항상 선을 행할 준비가 되어 있는 부드럽고 친절한 이타주의자'; break; 
    case 'enfj': $contents = '청중을 사로잡고 의욕을 불어넣는 카리스마 넘치는 지도자'; break; 
    case 'enfp': $contents = '열정적이고 창의적인 성격으로, 긍정적으로 삶을 바라보는 사교적이면서도 자유로운 영혼'; break; 
   
    case 'istj': $contents = '사실을 중시하는 믿음직한 현실주의자'; break; 
    case 'isfj': $contents = '주변 사람을 보호할 준비가 되어 있는 헌신적이고 따뜻한 수호자'; break; 
    case 'estj': $contents = '사물과 사람을 관리하는 데 뛰어난 능력을 지닌 경영자'; break; 
    case 'esfj': $contents = '배려심이 넘치고 항상 다른 사람을 도울 준비가 되어 있는 성격으로, 인기가 많고 사교성 높은 마당발'; break; 
                             
    case 'istp': $contents = '대담하면서도 현실적인 성격으로, 모든 종류의 도구를 자유자재로 다루는 장인'; break; 
    case 'isfp': $contents = '항상 새로운 경험을 추구하는 유연하고 매력 넘치는 예술가'; break; 
    case 'estp': $contents = '위험을 기꺼이 감수하는 성격으로, 영리하고 에너지 넘치며 관찰력이 뛰어난 사업가'; break; 
    case 'esfp': $contents = '즉흥적이고 넘치는 에너지와 열정으로 주변 사람을 즐겁게 하는 연예인'; break; 
}

$mbti = strtoupper($mbti);
?>

<div>
	<h4>출처 : <a href="https://www.16personalities.com/ko/%EC%84%B1%EA%B2%A9-%EC%9C%A0%ED%98%95" title="16 Personalities 사이트 가기">16 Personalities</a></h4>
	<p><?= $mbti?></p>
	<p><?= $contents?></p>
</div>	


<?php include 'func/footer.php';?>