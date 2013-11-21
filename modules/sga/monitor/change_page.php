<?php

/**
 * 
 * Copyright (C) 2009 DATAPREV - Empresa de Tecnologia e Informações da Previdência Social - Brasil
 *
 * Este arquivo é parte do programa SGA Livre - Sistema de Gerenciamento do Atendimento - Versão Livre
 *
 * O SGA é um software livre; você pode redistribuí­-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como 
 * publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença, ou (na sua opnião) qualquer versão.
 *
 * Este programa é distribuído na esperança que possa ser útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer
 * MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "LICENCA.txt", junto com este programa, se não, escreva para a 
 * Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA.
 *
**/

SGA::check_login('sga.monitor');

/**
 * Altera o index de paginacao do monitor
 */
try {
	
	if (isset($_GET['page'])) {		
	    $atual = Session::getInstance()->get('MONITOR_PAGINA');
	    $total = sizeof(Session::getInstance()->get('MONITOR')->get_servicos());
	    if ($_GET['page'] == -1) {
	        $pagina = ($atual-4 < 0)?0:$atual-4;
	    }
	    else if ($_GET['page'] == 1) {
	        $pagina = ($atual+4 >= $total)?$atual:$atual+4;
	    }
	    Session::getInstance()->set('MONITOR_PAGINA', $pagina);
	}
	else if (isset($_GET['goto_page'])) {
	    Session::getInstance()->set('MONITOR_PAGINA', $_GET['goto_page']);
	}
}
catch(Exception $e) {
	TMonitor::display_exception($e);
}


?>