<?php $this->load->view('include/header'); ?>
	<div id="loading"></div>
    <div id="map"></div>
    <div class="search" id="output">
        <div id="search-box">
            <?php 
                echo form_open('search#output');
                $data = array(
                        'name' => 'search',
                        'id' => 'search',
                        'maxlength' => 100,
                        'placeholder' => 'Search for District, Organization, Person, Tool',
                        'pattern' => '.{3,}',
                        'oninvalid' => "setCustomValidity('Minimum 3 characters.')",
                        'oninput' => "setCustomValidity('')",
                        'required' => 'required',
                        'value' => set_value('search')
                    );
                echo form_input($data);
                echo form_submit('search-submit', '', 'id="search-submit"');
                echo form_close(); 
            ?>
        </div>
        <div id="filters">
            <?php 
                echo form_open('filters#output');
                
                $batch = array(
                        '' => 'Select Batch',
                        'batch1sg' => 'Batch1 SG',
                        'batch1lg' => 'Batch1 LG',
                        'batch2sg' => 'Batch2 SG',
                        'batch2lg' => 'Batch2 LG',
                        'batch3sg' => 'Batch3 SG',
                        'batch3lg' => 'Batch3 LG',
                        'batch4sg' => 'Batch4 SG',
                        'batch4lg' => 'Batch4 LG'
                    );
            ?>
            <span class="custom-dropdown custom-dropdown--white custom-dropdown--small">
                <?php               
                    echo form_dropdown('batch', $batch, set_value('batch', 'batch'), "class='custom-dropdown__select custom-dropdown__select--white'" );
                ?>
            </span>

            <?php
                $district = array (
                    '' => 'Select District',
                    'achham' => 'Achham',
                    'arghakhanchi' => 'Arghakhanchi',
                    'baglung' => 'Baglung', 
                    'baitadi' => 'Baitadi',
                    'bajhang' => 'Bajhang',
                    'bajura' => 'Bajura',
                    'banke' => 'Banke',
                    'bara' => 'Bara',
                    'bardiya' => 'Bardiya',
                    'bhaktapur' => 'Bhaktapur',
                    'bhojpur' => 'Bhojpur',
                    'chitwan' => 'Chitwan',
                    'dadeldhura' => 'Dadeldhura', 
                    'dailekh' => 'Dailekh',
                    'dang' => 'Dang', 
                    'darchula' => 'Darchula',
                    'dhading' => 'Dhading',
                    'dhankuta' => 'Dhankuta',
                    'dhanusha' => 'Dhanusha',
                    'dolakha' => 'Dolakha',
                    'dolpa' => 'Dolpa',
                    'doti' => 'Doti',
                    'gorkha' => 'Gorkha',
                    'gulmi' => 'Gulmi',
                    'humla' => 'Humla',
                    'illam' => 'Illam',
                    'jajarkot' => 'Jajarkot',
                    'jhapa' => 'Jhapa',
                    'jumla' => 'Jumla',
                    'kailali' => 'Kailali',
                    'kalikot' => 'Kalikot',
                    'kanchanpur' => 'Kanchanpur',
                    'kapilvastu' => 'Kapilvastu',
                    'kaski' => 'Kaski',
                    'kathmandu' => 'Kathmandu',
                    'kavrepalanchok' => 'Kavrepalanchok',
                    'khotang' => 'Khotang',
                    'lalitpur' => 'Lalitpur',
                    'lamjung' => 'Lamjung',
                    'mahottari' => 'Mahottari',
                    'makwanpur' => 'Makwanpur',
                    'manang' => 'Manang',
                    'morang' => 'Morang',
                    'mugu' => 'Mugu',
                    'mustang' => 'Mustang',
                    'myagdi' => 'Myagdi',
                    'nawalparasi' => 'Nawalparasi',
                    'nuwakot' => 'Nuwakot',
                    'okhaldhunga' => 'Okhaldhunga',
                    'palpa' => 'Palpa',
                    'panchthar' => 'Panchthar',
                    'parbat' => 'Parbat',
                    'parsa' => 'Parsa',
                    'pyuthan' => 'Pyuthan',
                    'ramechhap' => 'Ramechhap',
                    'rasuwa' => 'Rasuwa',
                    'rautahat' => 'Rautahat',
                    'rolpa' => 'Rolpa',
                    'rukum' => 'Rukum',
                    'rupandehi' => 'Rupandehi',
                    'salyan' => 'Salyan',
                    'sankhuwasabha' => 'Sankhuwasabha',
                    'saptari' => 'Saptari',
                    'sarlahi' => 'Sarlahi',
                    'sindhuli' => 'Sindhuli',
                    'sindhupalchok' => 'Sindhupalchok',
                    'siraha' => 'Siraha',
                    'solukhumbu' => 'Solukhumbu',
                    'sunsari' => 'Sunsari',
                    'surkhet' => 'Surkhet',
                    'syangja' => 'Syangja',
                    'tanahu' => 'Tanahu',
                    'taplejung' => 'Taplejung',
                    'terhathum' => 'Terhathum',
                    'udayapur' => 'Udayapur'
                );
            ?>
            <span class="custom-dropdown custom-dropdown--white custom-dropdown--small">
                <?php
                    echo form_dropdown('district', $district, set_value('district', 'district'), "class='custom-dropdown__select custom-dropdown__select--white'");
                ?>
            </span>

            <?php
                $tools = array(
                        '' => 'Select Tool',
                        // 'analysis of national budgets' => 'Analysis of National Budgets',
                        'budget analysis' => 'Budget Anlaysis',
                        'budget demystification and outreach' => 'Budget Demystification and Outreach',
                        // 'budget work' => 'Budget Work',
                        //'budgets of local bodies' => 'Budgets of Local Bodies',
                        'checklist of entitlements' => 'Checklist of Entitlements',
                        'checklist of law and rules' => 'Checklist of Law and Rules',
                        // 'checklist of standards & indicators' => 'Checklist of Standards & Indicators',
                        'citizen charter' => 'Citizen Charter',
                        'citizen complaint structures' => 'Citizen Complaint Structures',
                        'citizen report card' => 'Citizen Report Card',
                        'citizen watch group' => 'Citizen Watch Group',
                        'citizen jury' => 'Citizen Jury',
                        'civic education' => 'Civic Education',                        
                        // 'community led procurement' => 'Community Led Procurement',
                        'community score card' => 'Community Score Card',
                        // 'declaration of assets' => 'Declaration of Assets',
                        // 'identified sector for pets' => 'Identified Sector for PETS',
                        // 'independent budget analysis' => 'Independent Budget Anlaysis',
                        // 'integrity pact' => 'Integrity Pact',
                        // 'multi-stakeholder groups' => 'Multi-stakeholder Groups',
                        'participatory budget analysis' => 'Participatory Budget Analysis',
                        'participatory budgeting' => 'Participatory Budgeting',
                        'participatory national model budget' => 'Participatory National Model Budget',
                        'participatory planning' => 'Participatory Planning',
                        'public audit' => 'Public Audit',
                        'public expenditure tracking' => 'Public Expenditure Tracking Surveys(PETS)',
                        'public grievance redressal mechanism' => 'Public Grievance Redressal Mechanism',
                        'public hearing' => 'Public Hearing',
                        'public help desk' => 'Public Help Desk',
                        'public revenue monitoring' => 'Public Revenue Monitoring',
                        'policy appraisal' => 'Policy Appraisal',
                        'right to information' => 'Right to Information',
                        'social security allowance fund' => 'Social Security Allowance Fund',
                        'tracking of public services' => 'Tracking of Public Services',
                        // 'understanding conflict of interest' => 'Understanding Conflict of Interest',
                        'zero corruption campaign' => 'Zero Corruption Campaign'
                    );
            ?>
            <span class="custom-dropdown custom-dropdown--white custom-dropdown--small">
                <?php
                    echo form_dropdown('tool', $tools, set_value('tool', 'tool'), "class='custom-dropdown__select custom-dropdown__select--white'");
                ?>
            </span>

            <?php
                $sector = array(
                    '' => 'Select Sector',
                    'agriculture' => 'Agriculture',
                    // 'awareness raising' => 'Awareness Raising',
                    // 'budget' => 'Budget',
                    'education' => 'Education',
                    // 'entitlements' => 'Entitlements',
                    //'finance' => 'Finance',
                    //'social protection' => 'Social Protection',
                    // 'good governance' => 'Good Governance',
                    'health' => 'Health',
                    // 'infrastructure' => 'Infrastructure',
                    // 'law and justice' => 'Law and Justice',
                    // 'local development' => 'Local Development',
                    // 'performance monitoring' => 'Performance Monitoring',
                    'public administration' => 'Public Administration, Law, and Justice',
                    'water and sanitation' => 'Water and Sanitation'
                );
            ?>
            <span class="custom-dropdown custom-dropdown--white custom-dropdown--small">
                <?php
                    echo form_dropdown('sector', $sector, set_value('sector', 'sector'), "class='custom-dropdown__select custom-dropdown__select--white'");
                ?>
            </span>
            
            <?php
                $theme = array(
                        '' => 'Select Theme',
                        'municipal governance' => 'Municipal Governance (MG)',
                        'public financial management' => 'Public Financial Mangement (PFM)',
                        'public sector governance' => 'Public Sector Governance (PSG)',
                        'public service delivery' => 'Public Service Delivery (PSD)'
                    );
            ?>
            <span class="custom-dropdown custom-dropdown--white custom-dropdown--small">
                <?php
                    echo form_dropdown('theme', $theme, set_value('theme', 'theme'), "class='custom-dropdown__select custom-dropdown__select--white'");
                ?>
            </span>

            <?php
                $funding = array(
                        '' => 'Select Funding',
                        'mdtf' => 'Multi Donor Trust Fund (MDTF)',
                        'spbf' => 'State and Peace Building Fund (SPBF)',
                        'both' => 'Both'
                    );
            ?>
            <span class="custom-dropdown custom-dropdown--white custom-dropdown--small">   
                <?php
                    echo form_dropdown('funding', $funding, set_value('funding', 'funding'), "class='custom-dropdown__select custom-dropdown__select--white'");
                ?>
            </span>

            <?php
                $title = array(
                    '' => 'Select Gender',
                    'mr' => 'Male',
                    'ms' => 'Female',
                    'both' => 'Both'
                );
            ?>
            <span class="custom-dropdown custom-dropdown--white custom-dropdown--small">
                <?php
                    echo form_dropdown('title', $title, set_value('title', 'title'), "class='custom-dropdown__select custom-dropdown__select--white'");
                ?>
            </span>

            <?php
                $ethnicity = array(
                    '' => 'Select Ethnicity',
                    'brahmin' => 'Brahmin',
                    'chhetri' => 'Chhetri',
                    'dalit' => 'Dalit',
                    'janajati' => 'Janajati',
                    'madhesi' => 'Madhesi',
                    'muslim' => 'Muslim',
                    'tharu' => 'Tharu'
                );
            ?>
            <span class="custom-dropdown custom-dropdown--white custom-dropdown--small">
                <?php
                    echo form_dropdown('ethnicity', $ethnicity, set_value('ethnicity', 'ethnicity'), "class='custom-dropdown__select custom-dropdown__select--white'");
                ?>
            </span>

            <?php
                $status = array(
                        '' => 'Select Status',
                        'ongoing' => 'Ongoing',
                        'complete' => 'Complete',
                        'both' => 'Both'
                    );
            ?>
            <span class="custom-dropdown custom-dropdown--white custom-dropdown--small">
                <?php
                    echo form_dropdown('status', $status, set_value('status', 'status'), "class='custom-dropdown__select custom-dropdown__select--white'");
                ?>
            </span>

            <?php
                echo form_submit('submit', 'Go', "class='go'");
                echo form_close();
            ?>
        </div>
    </div>
    <div id="map-result">
        <?php if(isset($subview)) $this->load->view($subview); ?>
        <?php if(isset($default)) echo "<p style='text-align: center; color: #01535e; font-weight: bold'>" . $default . "</p>"; ?>
    </div>
    <div id="report">
        <div id="column-chart"></div>
        <div id="pie-chart"></div> 
    </div>

<?php $this->load->view('include/footer'); ?>