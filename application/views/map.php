<?php $this->load->view('include/header'); ?>
	<div id="map"></div>
    <div id="loading"></div>
    <div class="search">
        <div id="search-box">
            <?php 
                echo form_open('search');
                $data = array(
                        'name' => 'search',
                        'id' => 'search',
                        'size' => 40,
                        'maxlength' => 100,
                        'placeholder' => 'Search for District, Organization, Person, Tool',
                        'pattern' => '.{3,}',
                        'oninvalid' => "setCustomValidity('Minimum 3 letters or numbers.')",
                        'oninput' => "setCustomValidity('')"
                    );
                echo form_input($data);
                echo form_close(); 
            ?>
        </div>
        <div id="filters">
            <?php 
                echo form_open('filters');
                
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
                echo form_dropdown('batch', $batch);

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
                echo form_dropdown('district', $district);

                $tools = array(
                        '' => 'Select Tool',
                        'citizen charter' => 'Citizen Charter',
                        'checklist of entitlements' => 'Checklist of Entitlements',
                        'budgets of local bodies' => 'Budgets of Local Bodies',
                        'budget demystification and outreach' => 'Budget Demystification and Outreach',
                        'right to information' => 'Right to Information',
                        'checklist of law and rules' => 'Checklist of Law and Rules',
                        'civic education' => 'Civic Education',
                        'public expenditure tracking' => 'Public Expenditure Tracking',
                        'check list of standards & indicators' => 'Check list of Standards & Indicators',
                        'community score card' => 'Community Score Card',
                        'citizen report card' => 'Citizen Report Card',
                        'public hearing' => 'Public Hearing',
                        'public audit' => 'Public Audit',
                        'public revenue monitoring' => 'Public Revenue Monitoring',
                        'public help desk' => 'Public Help Desk',
                        'policy appraisal' => 'Policy Appraisal',
                        'social security allowance fund' => 'Social Security Allowance Fund',
                        'identified sector for pets' => 'Identified Sector for PETS',
                        'budget work' => 'Budget Work',
                        'independent budget analysis' => 'Independent Budget Anlaysis',
                        'citizen complaint structures' => 'Citizen Complaint Structures',
                        'tracking of public services' => 'Tracking of Public Services',
                        'zero corruption campaign' => 'Zero Corruption Campaign',
                        'citizen watch group' => 'Citizen Watch Group',
                        'citizen jury' => 'Citizen Jury',
                        'civic education' => 'Civic Education',
                        'analysis of national budgets' => 'Analysis of National Budgets',
                        'public grievance redressal mechanism' => 'Public Grievance Redressal Mechanism',
                        'multi-stakeholder groups' => 'Multi-stakeholder Groups',
                        'participatory planning' => 'Participatory Planning',
                        'participatory budgeting' => 'Participatory Budgeting',
                        'participatory national model budget' => 'Participatory National Model Budget',
                        'community led procurement' => 'Community Led Procurement',
                        'declaration of assets' => 'Declaration of Assets',
                        'understanding conflict of interest' => 'Understanding Conflict of Interest',
                        'integrity pact' => 'Integrity Pact'
                    );
                echo form_dropdown('tool', $tools);

                $title = array(
                    '' => 'Select Gender',
                    'mr' => 'Male',
                    'ms' => 'Female',
                    'both' => 'Both'
                );
                echo form_dropdown('title', $title);

                $ethnicity = array(
                        '' => 'Select Ethnicity',

                );
                echo form_dropdown('ethnicity', $ethnicity);

                $sector = array(
                        '' => 'Select Sector',
                        'agriculture' => 'Agriculture',
                        // 'awareness raising' => 'Awareness Raising',
                        // 'budget' => 'Budget',
                        'education' => 'Education',
                        // 'entitlements' => 'Entitlements',
                        'finance' => 'Finance',
                        'social protection' => 'Social Protection',
                        // 'good governance' => 'Good Governance',
                        'health' => 'Health',
                        // 'infrastructure' => 'Infrastructure',
                        'law and justice' => 'Law and Justice',
                        // 'local development' => 'Local Development',
                        // 'performance monitoring' => 'Performance Monitoring',
                        'public administration' => 'Public Administration',
                        'water and sanitation' => 'Water and Sanitation'
                    );
                echo form_dropdown('sector', $sector);
                
                $theme = array(
                        '' => 'Select Theme',
                        'municipal governance' => 'Municipal Governance (MG)',
                        'public financial management' => 'Public Financial Mangement (PFM)',
                        'public sector governance' => 'Public Sector Governance (PSG)',
                        'public service delivery' => 'Public Service Delivery (PSD)'
                    );
                echo form_dropdown('theme', $theme);

                $funding = array(
                        '' => 'Select Funding',
                        'mdtf' => 'Multi Donor Trust Fund (MDTF)',
                        'spbf' => 'State and Peace Building Fund (SPBF)',
                        'both' => 'Both'
                    );
                echo form_dropdown('funding', $funding);

                $status = array(
                        '' => 'Select Status',
                        'ongoing' => 'Ongoing',
                        'complete' => 'Complete',
                        'both' => 'Both'
                    );
                echo form_dropdown('status', $status);

                echo form_submit('submit', 'Go', "class='go'");

                echo form_close();
            ?>
        </div>
    </div>
    <?php if(isset($subview)) $this->load->view($subview); ?>
    <div id="map-result"></div>
    <div id="column-chart"></div>

<?php $this->load->view('include/footer'); ?>