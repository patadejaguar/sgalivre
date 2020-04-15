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

SGA::check_access('sga.admin');

try {    

    # verifica se o modulo esta devidamente instalado   
    Session::getInstance()->get(SGA::K_CURRENT_MODULE)->verifica();
	
	TAdmin::display_header("Administração");
	
	// Configuracao Grupos
	//TConfiguracao::display_group_control();
	
	// Configuracao Usuarios
	TAdmin::display_administracao();
	
	// Configuracao Cargos
	//TConfiguracao::display_cargos_config();

	// Configuracao servicos
//	TConfiguracao::display_servicos_config();

	//$usuario = Session::getInstance()->get(SGA::K_CURRENT_USER);
	//TConfiguracao::display_configuracao($usuario);
}
catch (Exception $e) {
	Template::display_exception($e);
}

?>
