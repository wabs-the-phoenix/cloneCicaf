
    <div class= "">
        <div class="title">
            <h2>Annuaire des agents de l'entreprise</h2>
            
        </div>
        <?php 
            if(isset($error) || isset($success)){
                $class=($error)? "negative": "positive";
                $message=($error)? $error: $success;
                ?>
                <div class="ui <?= $class; ?> message">
                    <i class="close icon"></i>
                    <?= $message; ?>
                </div>
                <?php 
            }
        ?>
        
        
            <div class="item left">
                        <button class="ui right small primary labeled icon button" id="addBien">
                    <i class="plus icon"></i> Nouvel agent
                </button>
            </div>
        <div class="ui divider"></div>
        <div class="board">
            <form action="" method='POST' class="relative" id="entrChoice">
                <table id="TableBien" class="ui compact celled striped definition table">
                    <thead class="full-width">
                        <tr>
                            <th>Noms</th>
                            <th>Etat civil</th>
                            <th>Fonction</th>
                            <th>Service</th>
                            <th class="hidden-480">Entreprise/Entité</th>
                            <th class="hidden-480">Date d'ambauche</th>		
                            <th class="hidden-480">Status</th>									

                            <th></th>	
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($agent->findAll() as $data): ?> 
                            <?php $searchDepart=$depart->findBy(['AgentId'=>$data->idAgent]) ?>  

                            <tr class="<?= ($searchDepart)? "red":"" ?>">
                                <td>
                                    <?= strtoupper($data->NomAgent. " ".$data->PostNomAgent)." ". ucfirst($data->Prenom)  ?>
                                </td>

                                <td>
                                    <?= strtoupper($data->EtatCivil)  ?>
                                </td>
                                <td><?= $data->FonctionId ?></td>
                                <td class="hidden-480"> <?= $service->find($data->ServiceId)->Service; ?> </td>
                                <td>
                                <?php //echo $entite->find($data->EntrepriseId)->SNomEntreprise ;?></td>

                                <td class="hidden-480">
                                    <?= $data->DateEmbauche ;?>
                                </td>
                                <td class="hidden-480"> <?= ($searchDepart)? "contrat resilié ":"contrat en cours..." ?>
                                </td>

                                <td>
                                    <button class="ui compact primary icon button" id="details" data-tooltip="Plus de détails" >
                                                <i class="search plus icon"></i>
                                    </button>	
                                    <input type="hidden" name="idAgentForm" id="idAgentForm" value="<?= $data->idAgent ;?>">
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>                                               
                        
                    </tbody>
                </table>
                
            </form>
        </div>
</div>




<div id="addBienForm" class="ui modal">
    <i class="close icon"></i>
  <div class="header">Ajouter un nouvel agent </div>
  <div class="content">
  <form  method="post" class="ui form">
    <div class="ui two column divided grid">
        <div class="height wide column">
            <div class="ui group">
                <label for="nom">Nom</label>
                <div class="ui left icon fluid input">
                    <input type="text" id="nom" name="nom" placeholder="Saisir le nom">
                    <i class="user icon"></i>
                </div>
            </div>            
            <br>
            <div class="ui group">
                <label for="postnom">Postnom</label>
                <div class="ui left icon fluid input">
                    <input type="text" id="postnom" name="postnom" placeholder="Saisir le postnom">
                    <i class="user icon"></i>
                </div>
            </div>
            <br>
            <div class="ui group">
                <label for="prenom">Prenom</label>
                <div class="ui left icon fluid input">
                    <input type="text" id="prenom" name="prenom" placeholder="Saisir le prenom">
                    <i class="user icon"></i>
                </div>
            </div>
            
            <br>
            <label for="genre">Genre</label>
            <div class="ui left icon fluid input">
            
                <select name="genre" id="genre" class="ui fluid dropdown" >
                    <option value="" disabled selected>Choisir le genre</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
            </div>
            <br>
            <label for="date">Date de naissance</label>
            <div class="ui left icon fluid input">
                <input type="date" id="date" name="date" >
                <i class="calendar icon"></i>
            </div>
            <br>
            <label for="nationalite">Nationalité</label>
            <div class="ui fluid search selection dropdown">
                <input type="hidden" name="country">
                <i class="dropdown icon"></i>
                <div class="default text">Selectionner une nationalité</div>
                    <div class="menu">
                        <div class="item" data-value="af"><i class="af flag"></i>Afghanistan</div>
                        <div class="item" data-value="ax"><i class="ax flag"></i>Aland Islands</div>
                        <div class="item" data-value="al"><i class="al flag"></i>Albania</div>
                        <div class="item" data-value="dz"><i class="dz flag"></i>Algeria</div>
                        <div class="item" data-value="as"><i class="as flag"></i>American Samoa</div>
                        <div class="item" data-value="ad"><i class="ad flag"></i>Andorra</div>
                        <div class="item" data-value="ao"><i class="ao flag"></i>Angola</div>
                        <div class="item" data-value="ai"><i class="ai flag"></i>Anguilla</div>
                        <div class="item" data-value="ag"><i class="ag flag"></i>Antigua</div>
                        <div class="item" data-value="ar"><i class="ar flag"></i>Argentina</div>
                        <div class="item" data-value="am"><i class="am flag"></i>Armenia</div>
                        <div class="item" data-value="aw"><i class="aw flag"></i>Aruba</div>
                        <div class="item" data-value="au"><i class="au flag"></i>Australia</div>
                        <div class="item" data-value="at"><i class="at flag"></i>Austria</div>
                        <div class="item" data-value="az"><i class="az flag"></i>Azerbaijan</div>
                        <div class="item" data-value="bs"><i class="bs flag"></i>Bahamas</div>
                        <div class="item" data-value="bh"><i class="bh flag"></i>Bahrain</div>
                        <div class="item" data-value="bd"><i class="bd flag"></i>Bangladesh</div>
                        <div class="item" data-value="bb"><i class="bb flag"></i>Barbados</div>
                        <div class="item" data-value="by"><i class="by flag"></i>Belarus</div>
                        <div class="item" data-value="be"><i class="be flag"></i>Belgium</div>
                        <div class="item" data-value="bz"><i class="bz flag"></i>Belize</div>
                        <div class="item" data-value="bj"><i class="bj flag"></i>Benin</div>
                        <div class="item" data-value="bm"><i class="bm flag"></i>Bermuda</div>
                        <div class="item" data-value="bt"><i class="bt flag"></i>Bhutan</div>
                        <div class="item" data-value="bo"><i class="bo flag"></i>Bolivia</div>
                        <div class="item" data-value="ba"><i class="ba flag"></i>Bosnia</div>
                        <div class="item" data-value="bw"><i class="bw flag"></i>Botswana</div>
                        <div class="item" data-value="bv"><i class="bv flag"></i>Bouvet Island</div>
                        <div class="item" data-value="br"><i class="br flag"></i>Brazil</div>
                        <div class="item" data-value="vg"><i class="vg flag"></i>British Virgin Islands</div>
                        <div class="item" data-value="bn"><i class="bn flag"></i>Brunei</div>
                        <div class="item" data-value="bg"><i class="bg flag"></i>Bulgaria</div>
                        <div class="item" data-value="bf"><i class="bf flag"></i>Burkina Faso</div>
                        <div class="item" data-value="mm"><i class="mm flag"></i>Burma</div>
                        <div class="item" data-value="bi"><i class="bi flag"></i>Burundi</div>
                        <div class="item" data-value="tc"><i class="tc flag"></i>Caicos Islands</div>
                        <div class="item" data-value="kh"><i class="kh flag"></i>Cambodia</div>
                        <div class="item" data-value="cm"><i class="cm flag"></i>Cameroon</div>
                        <div class="item" data-value="ca"><i class="ca flag"></i>Canada</div>
                        <div class="item" data-value="cv"><i class="cv flag"></i>Cape Verde</div>
                        <div class="item" data-value="ky"><i class="ky flag"></i>Cayman Islands</div>
                        <div class="item" data-value="cf"><i class="cf flag"></i>Central African Republic</div>
                        <div class="item" data-value="td"><i class="td flag"></i>Chad</div>
                        <div class="item" data-value="cl"><i class="cl flag"></i>Chile</div>
                        <div class="item" data-value="cn"><i class="cn flag"></i>China</div>
                        <div class="item" data-value="cx"><i class="cx flag"></i>Christmas Island</div>
                        <div class="item" data-value="cc"><i class="cc flag"></i>Cocos Islands</div>
                        <div class="item" data-value="co"><i class="co flag"></i>Colombia</div>
                        <div class="item" data-value="km"><i class="km flag"></i>Comoros</div>
                        <div class="item" data-value="cg"><i class="cg flag"></i>Congo Brazzaville</div>
                        <div class="item" data-value="cd"><i class="cd flag"></i>Congo</div>
                        <div class="item" data-value="ck"><i class="ck flag"></i>Cook Islands</div>
                        <div class="item" data-value="cr"><i class="cr flag"></i>Costa Rica</div>
                        <div class="item" data-value="ci"><i class="ci flag"></i>Cote Divoire</div>
                        <div class="item" data-value="hr"><i class="hr flag"></i>Croatia</div>
                        <div class="item" data-value="cu"><i class="cu flag"></i>Cuba</div>
                        <div class="item" data-value="cy"><i class="cy flag"></i>Cyprus</div>
                        <div class="item" data-value="cz"><i class="cz flag"></i>Czech Republic</div>
                        <div class="item" data-value="dk"><i class="dk flag"></i>Denmark</div>
                        <div class="item" data-value="dj"><i class="dj flag"></i>Djibouti</div>
                        <div class="item" data-value="dm"><i class="dm flag"></i>Dominica</div>
                        <div class="item" data-value="do"><i class="do flag"></i>Dominican Republic</div>
                        <div class="item" data-value="ec"><i class="ec flag"></i>Ecuador</div>
                        <div class="item" data-value="eg"><i class="eg flag"></i>Egypt</div>
                        <div class="item" data-value="sv"><i class="sv flag"></i>El Salvador</div>
                        <div class="item" data-value="gb"><i class="gb flag"></i>England</div>
                        <div class="item" data-value="gq"><i class="gq flag"></i>Equatorial Guinea</div>
                        <div class="item" data-value="er"><i class="er flag"></i>Eritrea</div>
                        <div class="item" data-value="ee"><i class="ee flag"></i>Estonia</div>
                        <div class="item" data-value="et"><i class="et flag"></i>Ethiopia</div>
                        <div class="item" data-value="eu"><i class="eu flag"></i>European Union</div>
                        <div class="item" data-value="fk"><i class="fk flag"></i>Falkland Islands</div>
                        <div class="item" data-value="fo"><i class="fo flag"></i>Faroe Islands</div>
                        <div class="item" data-value="fj"><i class="fj flag"></i>Fiji</div>
                        <div class="item" data-value="fi"><i class="fi flag"></i>Finland</div>
                        <div class="item" data-value="fr"><i class="fr flag"></i>France</div>
                        <div class="item" data-value="gf"><i class="gf flag"></i>French Guiana</div>
                        <div class="item" data-value="pf"><i class="pf flag"></i>French Polynesia</div>
                        <div class="item" data-value="tf"><i class="tf flag"></i>French Territories</div>
                        <div class="item" data-value="ga"><i class="ga flag"></i>Gabon</div>
                        <div class="item" data-value="gm"><i class="gm flag"></i>Gambia</div>
                        <div class="item" data-value="ge"><i class="ge flag"></i>Georgia</div>
                        <div class="item" data-value="de"><i class="de flag"></i>Germany</div>
                        <div class="item" data-value="gh"><i class="gh flag"></i>Ghana</div>
                        <div class="item" data-value="gi"><i class="gi flag"></i>Gibraltar</div>
                        <div class="item" data-value="gr"><i class="gr flag"></i>Greece</div>
                        <div class="item" data-value="gl"><i class="gl flag"></i>Greenland</div>
                        <div class="item" data-value="gd"><i class="gd flag"></i>Grenada</div>
                        <div class="item" data-value="gp"><i class="gp flag"></i>Guadeloupe</div>
                        <div class="item" data-value="gu"><i class="gu flag"></i>Guam</div>
                        <div class="item" data-value="gt"><i class="gt flag"></i>Guatemala</div>
                        <div class="item" data-value="gw"><i class="gw flag"></i>Guinea-Bissau</div>
                        <div class="item" data-value="gn"><i class="gn flag"></i>Guinea</div>
                        <div class="item" data-value="gy"><i class="gy flag"></i>Guyana</div>
                        <div class="item" data-value="ht"><i class="ht flag"></i>Haiti</div>
                        <div class="item" data-value="hm"><i class="hm flag"></i>Heard Island</div>
                        <div class="item" data-value="hn"><i class="hn flag"></i>Honduras</div>
                        <div class="item" data-value="hk"><i class="hk flag"></i>Hong Kong</div>
                        <div class="item" data-value="hu"><i class="hu flag"></i>Hungary</div>
                        <div class="item" data-value="is"><i class="is flag"></i>Iceland</div>
                        <div class="item" data-value="in"><i class="in flag"></i>India</div>
                        <div class="item" data-value="io"><i class="io flag"></i>Indian Ocean Territory</div>
                        <div class="item" data-value="id"><i class="id flag"></i>Indonesia</div>
                        <div class="item" data-value="ir"><i class="ir flag"></i>Iran</div>
                        <div class="item" data-value="iq"><i class="iq flag"></i>Iraq</div>
                        <div class="item" data-value="ie"><i class="ie flag"></i>Ireland</div>
                        <div class="item" data-value="il"><i class="il flag"></i>Israel</div>
                        <div class="item" data-value="it"><i class="it flag"></i>Italy</div>
                        <div class="item" data-value="jm"><i class="jm flag"></i>Jamaica</div>
                        <div class="item" data-value="jp"><i class="jp flag"></i>Japan</div>
                        <div class="item" data-value="jo"><i class="jo flag"></i>Jordan</div>
                        <div class="item" data-value="kz"><i class="kz flag"></i>Kazakhstan</div>
                        <div class="item" data-value="ke"><i class="ke flag"></i>Kenya</div>
                        <div class="item" data-value="ki"><i class="ki flag"></i>Kiribati</div>
                        <div class="item" data-value="kw"><i class="kw flag"></i>Kuwait</div>
                        <div class="item" data-value="kg"><i class="kg flag"></i>Kyrgyzstan</div>
                        <div class="item" data-value="la"><i class="la flag"></i>Laos</div>
                        <div class="item" data-value="lv"><i class="lv flag"></i>Latvia</div>
                        <div class="item" data-value="lb"><i class="lb flag"></i>Lebanon</div>
                        <div class="item" data-value="ls"><i class="ls flag"></i>Lesotho</div>
                        <div class="item" data-value="lr"><i class="lr flag"></i>Liberia</div>
                        <div class="item" data-value="ly"><i class="ly flag"></i>Libya</div>
                        <div class="item" data-value="li"><i class="li flag"></i>Liechtenstein</div>
                        <div class="item" data-value="lt"><i class="lt flag"></i>Lithuania</div>
                        <div class="item" data-value="lu"><i class="lu flag"></i>Luxembourg</div>
                        <div class="item" data-value="mo"><i class="mo flag"></i>Macau</div>
                        <div class="item" data-value="mk"><i class="mk flag"></i>Macedonia</div>
                        <div class="item" data-value="mg"><i class="mg flag"></i>Madagascar</div>
                        <div class="item" data-value="mw"><i class="mw flag"></i>Malawi</div>
                        <div class="item" data-value="my"><i class="my flag"></i>Malaysia</div>
                        <div class="item" data-value="mv"><i class="mv flag"></i>Maldives</div>
                        <div class="item" data-value="ml"><i class="ml flag"></i>Mali</div>
                        <div class="item" data-value="mt"><i class="mt flag"></i>Malta</div>
                        <div class="item" data-value="mh"><i class="mh flag"></i>Marshall Islands</div>
                        <div class="item" data-value="mq"><i class="mq flag"></i>Martinique</div>
                        <div class="item" data-value="mr"><i class="mr flag"></i>Mauritania</div>
                        <div class="item" data-value="mu"><i class="mu flag"></i>Mauritius</div>
                        <div class="item" data-value="yt"><i class="yt flag"></i>Mayotte</div>
                        <div class="item" data-value="mx"><i class="mx flag"></i>Mexico</div>
                        <div class="item" data-value="fm"><i class="fm flag"></i>Micronesia</div>
                        <div class="item" data-value="md"><i class="md flag"></i>Moldova</div>
                        <div class="item" data-value="mc"><i class="mc flag"></i>Monaco</div>
                        <div class="item" data-value="mn"><i class="mn flag"></i>Mongolia</div>
                        <div class="item" data-value="me"><i class="me flag"></i>Montenegro</div>
                        <div class="item" data-value="ms"><i class="ms flag"></i>Montserrat</div>
                        <div class="item" data-value="ma"><i class="ma flag"></i>Morocco</div>
                        <div class="item" data-value="mz"><i class="mz flag"></i>Mozambique</div>
                        <div class="item" data-value="na"><i class="na flag"></i>Namibia</div>
                        <div class="item" data-value="nr"><i class="nr flag"></i>Nauru</div>
                        <div class="item" data-value="np"><i class="np flag"></i>Nepal</div>
                        <div class="item" data-value="an"><i class="an flag"></i>Netherlands Antilles</div>
                        <div class="item" data-value="nl"><i class="nl flag"></i>Netherlands</div>
                        <div class="item" data-value="nc"><i class="nc flag"></i>New Caledonia</div>
                        <div class="item" data-value="pg"><i class="pg flag"></i>New Guinea</div>
                        <div class="item" data-value="nz"><i class="nz flag"></i>New Zealand</div>
                        <div class="item" data-value="ni"><i class="ni flag"></i>Nicaragua</div>
                        <div class="item" data-value="ne"><i class="ne flag"></i>Niger</div>
                        <div class="item" data-value="ng"><i class="ng flag"></i>Nigeria</div>
                        <div class="item" data-value="nu"><i class="nu flag"></i>Niue</div>
                        <div class="item" data-value="nf"><i class="nf flag"></i>Norfolk Island</div>
                        <div class="item" data-value="kp"><i class="kp flag"></i>North Korea</div>
                        <div class="item" data-value="mp"><i class="mp flag"></i>Northern Mariana Islands</div>
                        <div class="item" data-value="no"><i class="no flag"></i>Norway</div>
                        <div class="item" data-value="om"><i class="om flag"></i>Oman</div>
                        <div class="item" data-value="pk"><i class="pk flag"></i>Pakistan</div>
                        <div class="item" data-value="pw"><i class="pw flag"></i>Palau</div>
                        <div class="item" data-value="ps"><i class="ps flag"></i>Palestine</div>
                        <div class="item" data-value="pa"><i class="pa flag"></i>Panama</div>
                        <div class="item" data-value="py"><i class="py flag"></i>Paraguay</div>
                        <div class="item" data-value="pe"><i class="pe flag"></i>Peru</div>
                        <div class="item" data-value="ph"><i class="ph flag"></i>Philippines</div>
                        <div class="item" data-value="pn"><i class="pn flag"></i>Pitcairn Islands</div>
                        <div class="item" data-value="pl"><i class="pl flag"></i>Poland</div>
                        <div class="item" data-value="pt"><i class="pt flag"></i>Portugal</div>
                        <div class="item" data-value="pr"><i class="pr flag"></i>Puerto Rico</div>
                        <div class="item" data-value="qa"><i class="qa flag"></i>Qatar</div>
                        <div class="item" data-value="re"><i class="re flag"></i>Reunion</div>
                        <div class="item" data-value="ro"><i class="ro flag"></i>Romania</div>
                        <div class="item" data-value="ru"><i class="ru flag"></i>Russia</div>
                        <div class="item" data-value="rw"><i class="rw flag"></i>Rwanda</div>
                        <div class="item" data-value="sh"><i class="sh flag"></i>Saint Helena</div>
                        <div class="item" data-value="kn"><i class="kn flag"></i>Saint Kitts and Nevis</div>
                        <div class="item" data-value="lc"><i class="lc flag"></i>Saint Lucia</div>
                        <div class="item" data-value="pm"><i class="pm flag"></i>Saint Pierre</div>
                        <div class="item" data-value="vc"><i class="vc flag"></i>Saint Vincent</div>
                        <div class="item" data-value="ws"><i class="ws flag"></i>Samoa</div>
                        <div class="item" data-value="sm"><i class="sm flag"></i>San Marino</div>
                        <div class="item" data-value="gs"><i class="gs flag"></i>Sandwich Islands</div>
                        <div class="item" data-value="st"><i class="st flag"></i>Sao Tome</div>
                        <div class="item" data-value="sa"><i class="sa flag"></i>Saudi Arabia</div>
                        <div class="item" data-value="sn"><i class="sn flag"></i>Senegal</div>
                        <div class="item" data-value="cs"><i class="cs flag"></i>Serbia</div>
                        <div class="item" data-value="rs"><i class="rs flag"></i>Serbia</div>
                        <div class="item" data-value="sc"><i class="sc flag"></i>Seychelles</div>
                        <div class="item" data-value="sl"><i class="sl flag"></i>Sierra Leone</div>
                        <div class="item" data-value="sg"><i class="sg flag"></i>Singapore</div>
                        <div class="item" data-value="sk"><i class="sk flag"></i>Slovakia</div>
                        <div class="item" data-value="si"><i class="si flag"></i>Slovenia</div>
                        <div class="item" data-value="sb"><i class="sb flag"></i>Solomon Islands</div>
                        <div class="item" data-value="so"><i class="so flag"></i>Somalia</div>
                        <div class="item" data-value="za"><i class="za flag"></i>South Africa</div>
                        <div class="item" data-value="kr"><i class="kr flag"></i>South Korea</div>
                        <div class="item" data-value="es"><i class="es flag"></i>Spain</div>
                        <div class="item" data-value="lk"><i class="lk flag"></i>Sri Lanka</div>
                        <div class="item" data-value="sd"><i class="sd flag"></i>Sudan</div>
                        <div class="item" data-value="sr"><i class="sr flag"></i>Suriname</div>
                        <div class="item" data-value="sj"><i class="sj flag"></i>Svalbard</div>
                        <div class="item" data-value="sz"><i class="sz flag"></i>Swaziland</div>
                        <div class="item" data-value="se"><i class="se flag"></i>Sweden</div>
                        <div class="item" data-value="ch"><i class="ch flag"></i>Switzerland</div>
                        <div class="item" data-value="sy"><i class="sy flag"></i>Syria</div>
                        <div class="item" data-value="tw"><i class="tw flag"></i>Taiwan</div>
                        <div class="item" data-value="tj"><i class="tj flag"></i>Tajikistan</div>
                        <div class="item" data-value="tz"><i class="tz flag"></i>Tanzania</div>
                        <div class="item" data-value="th"><i class="th flag"></i>Thailand</div>
                        <div class="item" data-value="tl"><i class="tl flag"></i>Timorleste</div>
                        <div class="item" data-value="tg"><i class="tg flag"></i>Togo</div>
                        <div class="item" data-value="tk"><i class="tk flag"></i>Tokelau</div>
                        <div class="item" data-value="to"><i class="to flag"></i>Tonga</div>
                        <div class="item" data-value="tt"><i class="tt flag"></i>Trinidad</div>
                        <div class="item" data-value="tn"><i class="tn flag"></i>Tunisia</div>
                        <div class="item" data-value="tr"><i class="tr flag"></i>Turkey</div>
                        <div class="item" data-value="tm"><i class="tm flag"></i>Turkmenistan</div>
                        <div class="item" data-value="tv"><i class="tv flag"></i>Tuvalu</div>
                        <div class="item" data-value="ug"><i class="ug flag"></i>Uganda</div>
                        <div class="item" data-value="ua"><i class="ua flag"></i>Ukraine</div>
                        <div class="item" data-value="ae"><i class="ae flag"></i>United Arab Emirates</div>
                        <div class="item" data-value="us"><i class="us flag"></i>United States</div>
                        <div class="item" data-value="uy"><i class="uy flag"></i>Uruguay</div>
                        <div class="item" data-value="um"><i class="um flag"></i>Us Minor Islands</div>
                        <div class="item" data-value="vi"><i class="vi flag"></i>Us Virgin Islands</div>
                        <div class="item" data-value="uz"><i class="uz flag"></i>Uzbekistan</div>
                        <div class="item" data-value="vu"><i class="vu flag"></i>Vanuatu</div>
                        <div class="item" data-value="va"><i class="va flag"></i>Vatican City</div>
                        <div class="item" data-value="ve"><i class="ve flag"></i>Venezuela</div>
                        <div class="item" data-value="vn"><i class="vn flag"></i>Vietnam</div>
                        <div class="item" data-value="wf"><i class="wf flag"></i>Wallis and Futuna</div>
                        <div class="item" data-value="eh"><i class="eh flag"></i>Western Sahara</div>
                        <div class="item" data-value="ye"><i class="ye flag"></i>Yemen</div>
                        <div class="item" data-value="zm"><i class="zm flag"></i>Zambia</div>
                        <div class="item" data-value="zw"><i class="zw flag"></i>Zimbabwe</div>
                    </div>
            </div>
            <br>
            <div class="fields">
                <div class="six wide field">
                    <label for="numero">Numero</label>
                    <div class="ui left icon fluid input">
                        <input type="numeric" id="numero" name="numero" >
                        <i class="calculator icon"></i>
                    </div>
                </div>
                <div class="ten wide field">
                    <label for="avenue">Avenue</label>
                    <div class="ui left icon fluid input">
                        <input type="text" id="avenue" name="avenue" >
                        <i class="map outline icon"></i>
                    </div>
                </div>
                </div>
            <label for="communes">Commune</label>
            <div class="ui fluid search selection dropdown">
                <input type="hidden" name="communes">
                <i class="dropdown icon"></i>
                <div class="default text">Saved Contacts</div>
                <div class="menu">
                    <?php foreach($commune->findAll() as $dataCommune):?>
                        <div class="item" data-value="<?= $dataCommune->idCommune?>" data-text="<?= ucfirst($dataCommune->commune)?>">    
                        <?= ucfirst($dataCommune->commune)?>
                        </div>  
                    <?php endforeach;?>                 
                </div>
            </div>
            <br>
            <label for="QteInventaire">Quantité inventaire</label>
            <div class="ui left icon fluid input">
                <input type="numeric" id="QteInventaire" name="QteInventaire"  placeholder="Qte Inventaire">
                <i class="keyboard outline icon"></i>
            </div>
            <br>
            <label for="Affectation">Affectation du bien</label>
            <div class="ui left icon fluid input">
                <input type="text" id="Affectation" name="Affectation"  placeholder="Affectation">
                <i class="home icon"></i>
            </div>
            <br>
            <label for="Dure">Durée d'amortissement</label>
            <div class="ui left icon fluid input">
                <input type="text" id="Dure" name="Dure"  placeholder="Dure">
                <i class="clock icon"></i>
            </div>
            <br>
            <div id="tauxAmr">
                <label>Taux d'amortissement</label>
                <div class="ui left icon fluid input">
                    <input type="text" id="tauxammortissement" name="tauxammortissement"  disabled>
                    <i class="braille icon"></i>
                </div>
                <br>
            </div>
            
            
            <label for="date">Date Acquisition</label> 
            
            
                <div class="ui calendar" id="dateAquisition">
                    <div class="ui left icon fluid input">
                        <input type="text" id="date" name="date" class="date-picker"  placeholder="Date d'acquisition">
                        <i class="calendar icon"></i>
                    </div>
            </div>
        </div>
        
        <div class="height wide column">
        <br>
        <div class="ui left icon fluid input">
            <input type="text" id="compte14106" name="compte14106"  placeholder="compte14106">
            <i class="calculator icon"></i>
        </div>
        <br>
        <div class="ui left icon fluid input">
            <input type="text" id="compte24" name="compte24"  placeholder="compte24">
            <i class="calculator icon"></i>
        </div>
        <br>
        <div class="ui left icon fluid input">
            <input type="text" id="compte28" name="compte28"  placeholder="compte28">
            <i class="calculator icon"></i>
        </div>
        <br>
        <div class="ui left icon fluid input">
            <input type="text" id="compte68" name="compte68"  placeholder="compte68">
            <i class="calculator icon"></i>
        </div>
        </div>
        </div>
        </div>

    
  
    <div class="actions">
    <div class="item right">
                    <button class="ui right small cancel red labeled icon button" >
                        <i class="times icon"></i> Quitter
                    </button>
                
                    <button type="submit" class="ui right small green labeled icon button" name="ajout" id="ajout">
                        <i class="plus icon"></i> Ajouter
                    </button>
                </div>
    </div>
  </form>
</div>
<div id="detailsBox" class="ui modal">
    <i class="close icon"></i>
    <div class="header">Détails du bien </div>
    <div class="content">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <input type="hidden" name="id" id="id">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <th>Libelé</th>
                                <th colspan="2">Valeur</th>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>Désignation</td>
                                        <td>:</td>
                                        <td> <span id="designation"></span> </td>
                                    </tr>
                                    <tr>
                                        <td>Code Immo</td>
                                        <td>:</td>
                                        <td><span id="codeImmo"></span> </td>
                                    </tr>
                                    <tr>
                                        <td>Valeur brute</td>
                                        <td>:</td>
                                        <td><span id="valeurbrute"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Taux de change</td>
                                        <td>:</td>
                                        <td><span id="taux"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Qté initiale</td>
                                        <td>:</td>
                                        <td><span id="qteinitiale"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Qté Inventoriée</td>
                                        <td>:</td>
                                        <td><span id="qteinventaire"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Lieu d'affectation</td>
                                        <td>:</td>
                                        <td><span id="lieu"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Durée Immo</td>
                                        <td>:</td>
                                        <td><span id="dure"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Taux Amortissement</td>
                                        <td>:</td>
                                        <td><span id="tauxAmortissement"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Date d'acquisition</td>
                                        <td>:</td>
                                        <td><span id="date"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Compte 14 ou 106</td>
                                        <td>:</td>
                                        <td><span id="compte14_106"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Compte 24</td>
                                        <td>:</td>
                                        <td><span id="compte24"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Compte 28</td>
                                        <td>:</td>
                                        <td><span id="compte28"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Compte 68</td>
                                        <td>:</td>
                                        <td><span id="compte68"></span></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>													

                </div>
            </div>
            
        </div>