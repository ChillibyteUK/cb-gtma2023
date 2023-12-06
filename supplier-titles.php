<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");

$urls = array(
    'accura-tool-co' => 'Acura Tool Co | Rubber Moulding',
    'adam-r-winter-tooling' => 'R-Winter Tooling',
    'advanced-tooling-systems-folkestone' => 'Advanced Tooling Systems (Folkestone) | Tooling Technologies',
    'advanced-tooling-systems-uk-ltd' => 'Advanced Tooling Systems UK LTD | Rapid Prototyping',
    'ad-vance-engineering' => 'Ad-Vance Engineering | Injection Moulding & Tools',
    'alan-browne-lapping-services-limited' => 'Alan Browne Lapping Services - Precision Lapping',
    'allwick-patterns-ltd' => 'Allwick Patterns Ltd | Pattern Making',
    'alphateq-ltd' => 'Alphateq Ltd | Prototype Components',
    'ampco-metal-limited' => 'Ampco Metal Limited | Copper Alloys',
    'apex-metrology-ltd' => 'Apex Metrology Ltd | Complete Measurement Solutions',
    'aspin-engineering-ltd' => 'Aspin Engineering Ltd - Engineered Components',
    'avon-dynamic-calibration' => 'Avon-Dynamic | UKAS Calibration & Measurement Specialist',
    'bec-group' => 'BEC Group | Plastic Injection Moulding',
    'bedestone-ltd' => 'Bedestone Ltd | CNC Jig Grinding',
    'berg-co-gmbh-spanntechnik' => 'Berg & Co GmbH – Spanntechnik | Clamping Tools',
    'blum-novotest-limited' => 'Blum Novotest | Metrology Equipment for Machine Tools',
    'boneham-turner-ltd' => 'Boneham & Turner Ltd | Drill Bushes | Aerospace Components',
    'bowers-group' => 'Bowers Metrology | Measuring Equipment Suppliers',
    'braithwaite-re-build' => 'Braithwaite Re-Build | Machine Tool Production',
    'broomfield-carbide-gauges-ltd' => 'Broomfield Carbide Gauges Ltd | Gauge Blocks',
    'bruderer-uk-ltd' => 'Bruderer UK Ltd | High Speed Presses',
    'bruker-alicona' => 'Alicona UK Ltd | Optical Surface Metrology',
    'burcas-limited' => 'Burcas Ltd | Precision Tooling Supplier',
    'carl-zeiss-ltd' => 'Carl Zeiss Ltd | CMM',
    'carrs-toolsteel-technologies' => 'Carrs Toolsteel Technologies - Tool-Making Materials',
    'central-scanning' => 'Central Scanning | 3D Scanning & Digitisation',
    'ceratizit-uk-and-ireland-ltd' => 'Ceratizit UK and Ireland Ltd | Cutting Tool Manufacturers',
    'cgtech-ltd' => 'CGTech Ltd | GGTech Vericut',
    'che-metrology' => 'CHE Metrology | Calibration Equipment',
    'coventry-university' => 'Coventry University | Metrology & Measurement Courses',
    'css-group' => 'Casting Support Systems Ltd | Plastic Moulders',
    'cytec-systems-uk-ltd' => 'CyTec Systems UK Ltd | Hydraulic Cylinders',
    'dayton-progress-ltd' => 'Dayton Progress Ltd | Punches',
    'dudley-associates' => 'Dudley Associates Ltd | Plastic Moulding',
    'eclipse-magnetics' => 'Eclipse Magnetics - Innovative Magnetic Solutions',
    'ecm-developments-ltd' => 'ECM Developments Ltd | Electrochemical Machining',
    'eley-metrology-limited' => 'CNC Co-ordinate Measuring M',
    'engel-uk-ltd' => 'Engel UK Ltd Injection Moulding Machines',
    'engis-uk-ltd' => 'Engis (UK) Ltd | Superabrasive Finishing Systems',
    'ewikon' => 'Ewikon - Hot Runner Systems',
    'excel-precision' => 'Excel Precision | EDM Specialists | EDM Services',
    'faulkner-moulds' => 'Faulkner Moulds | Injection Mould Toolmaker',
    'fenton-precision-engineering-ltd' => 'Fenton Precision Engineering | Fenton Engineering',
    'frp-group-holdings-ltd' => 'Fenland RP Ltd | Rapid Manufacturing',
    'global-shop-solutions' => 'Global Shop Solutions - ERP Software',
    'gms-limited' => 'Grab Management Services Ltd - GMS',
    'gotools' => 'GoTools Ltd | Precision Toolmaker',
    'hadleigh-castings-ltd' => 'Hadleigh Castings Ltd | Leading Aluminium Foundry',
    'hartmetall-uk' => 'Hartmetall UK | Tungsten Carbide Rod Suppliers',
    'heidenhain-gb-ltd' => 'HEIDENHAIN | CNC Controls Precision Linear, Rotary & Angle Encoders',
    'imsm' => 'IMSM | ISO Standards Consultancy',
    'indysoft-europe-ltd' => 'Indysoft Europe Ltd - Calibration Software',
    'injection-moulding-tools-ltd' => 'Injection Moulding Tools Ltd - Injection Moulds',
    'investment-tooling-international' => 'Investment Tooling International | Precision Toolmakers',
    'jeb-technologies-ltd' => 'JEB Technologies Ltd | Tool and Jig Design',
    'jenton-international' => 'Jenton International | UV Curing and Drying',
    'kemet-international-ltd' => 'Kemet International Ltd | Precision Lapping',
    'konig-mtm' => 'König-mtm | Clamping Products | Machine Tools',
    'langstone-engineering-ltd' => 'Langstone Engineering Ltd - Precision Engineering',
    'lynar-manufacturing' => 'Lynar Manufacturing | Prototypes',
    'mahr-u-k-plc' => 'Mahr UK & Mahr Federal | Precision Meas',
    'manchester-metrology' => 'Manchester Metrology | Inspection Equipment',
    'manufacturing-resource-centre-mrc' => 'Manufactuing Resource Centre | Supply Chain Facility',
    'masterflow-uk' => 'Masterflow UK Manifold Systems',
    'menear-engineering' => 'Menear Engineering | Mould Tools & Precision Machinery',
    'metrology-uk' => 'Metrology UK | Measurement Solution Provider',
    'midas-pattern-company-ltd' => 'Midas Pattern Company Ltd | Pattern Making',
    'mouldtech-solutions' => 'Mould Making | Mouldtech Solutions',
    'national-physical-laboratory-npl' => 'NPL | National Measurement Institute',
    'n-d-precision-products' => 'ND Precision Products | Mould Tool',
    'nikon-metrology-uk-ltd' => 'Nikon Metrology | 3D Inspection & Measurement',
    'n-t-g-precision-engineers' => 'Newcastle Tool and Gauage | N.T.G. Precision Engineers',
    'ogm' => 'OGM - Plastic Injection Moulders',
    'omega-plastics-group' => 'Omega Plastics Group | Plastic Injection Moulding',
    'optimax-imaging-inspection-measurement-ltd' => 'Optimax Imaging Inspection & Measurement',
    'pdq-engineering-ltd' => 'PDQ Engineering LTD | Machine Tool Technologies',
    'pemberton-engineering-ltd' => 'Pemberton Engineering Ltd - Press Tool Design & Manufacture',
    'perfect-bore-manufacturing-ltd' => 'Perfect Bore Manufacturing Ltd | Gun Drilling',
    'project-innovations-ltd' => 'Project Innovations Ltd - Polymer Engineering & Consulting',
    'protolabs-europe' => 'Protolabs – Rapid Prototyping Parts',
    'psl-datatrack-prospec-systems-limited' => 'Production Control Software | PSL Datatrack',
    'quickgrind' => 'Quickgrind Carbide Tooling | Cutting Tools',
    'qvs-pro' => 'QVS Pro - Tooling and PPE - ',
    'rainford-precision-machines-ltd' => 'Rainford Precision Machines | Drill Tools',
    'r-a-labone' => 'Insert Moulding from R A Labone',
    'reflex-technical-services' => 'Reflex Technical Services | Injection Moulding Consultancy',
    'rem-systems-ltd' => 'REM Systems Ltd | Automation',
    'renfrew-group-international' => 'Renfrew Group International | Product Design Company',
    'renishaw-plc' => 'Renishaw Plc - CMMs',
    'ringspann-power-transmission' => 'Ringspann Power Transmission',
    'ringspann-remote-control-systems' => 'Ringspann Remote Control Systems | Bowden Cables',
    'ringspann-work-holding-technology' => 'Ringspann Work Holding Technology',
    'robinson-pattern-equipment-ltd' => 'Robinson Pattern Equipment Ltd - Pattern Making',
    'roemheld-uk-limited' => 'Roemheld UK Limited | Workholding',
    'rud-chains-ltd' => 'Rud Chains Ltd - Lifting & Lashing Applications',
    'rutland-plastics' => 'Rutland Plastics - Injection Mould',
    'solent-university-warsash-school-of-maritime-science-engineering' => 'Solent University - Warsash School of Maritime Science & Engineering',
    'ssab-ltd' => 'SSAB Ltd | Toolox',
    'starrag-uk-limited' => 'Starrag UK Limited | Precision Machining',
    'stirling-business-transfer-specialists-and-brokers' => 'Stirling | Business Valuations',
    'superite-tools-ltd' => 'Superite Precision - Superite Tools Repair & Modification',
    'system-3r-uk' => 'System 3R | Tooling, Workholding & Automation Specialists',
    'talbot-tool-co-ltd' => 'Talbot Tool Co Ltd | Jig Bushes | Jig & Tooling Parts',
    'tech-ni-plant-ltd' => 'Tech-ni-Plant Ltd | Surface Treatment',
    'tekniplaz-limited' => 'Tekniplaz Limited - Injection Mould Toolmakers',
    'tg-engineering' => 'T&G Engineering - Precision Machining',
    'thermofax-ltd' => 'Thermofax Ltd - Heat Treatment Specialists',
    'the-sempre-group-ltd' => 'The Sempre Group Ltd | Metrology Equiptment & Suppliers',
    'third-dimension' => 'Third Dimension | Optical Measurement Systems',
    'thomas-keating-ltd' => 'Thomas Keating Ltd | Mould Tool Manufacturer',
    'tokai-carbon-europe' => 'Tokai Carbon Europe - Graphites',
    'toolrite-ltd' => 'Toolrite Ltd | Progression Tools',
    'tri-tech-3d' => 'Tri Tech 3D Printing',
    'uddeholm-ltd' => 'Uddeholm Ltd | Tool Steels Supplier',
    'verus-metrology-partners' => 'Verus Metrology | Fixture Design',
    'vision-engineering-ltd' => 'Vision Engineering Ltd | Optical Systems',
    'waveney-precision-ltd' => 'Waveney Precision Ltd | EDM',
    'wds-components-ltd' => 'WDS Component Ltd | Jig & Machine Accessories',
    'wenzel-uk-limited' => 'Wenzel UK Ltd | CMM',
    'werth-metrology-ltd' => 'Werth Metrology Ltd | Coordinate Measurement Equipment',
    'whiteland-engineering-ltd' => 'Whiteland Engineering - Sub-contract Precision Machining',
    'whittit-insurance' => 'Whittit Insurance | Specialist Tools & Machinery',
    'w-h-tildesley' => 'W.H.Tildesley - Drop Forging Company',
    'wogaard' => 'Wogaard | Coolant Saver',
    'ws2-coatings-ltd' => 'WS2 Coatings Ltd | Surface Treatment',
    'yamazaki-mazak-u-k-ltd' => 'Yamazaki Mazak | CNC Machine Tools & Manufacturing Systems',
    'yorkshire-precision-gauges-limited' => 'Yorkshire Precision Gauges Ltd | Precision Gauging Products | go no go gauges',
    'zeeko-ltd' => 'Zeeko Ltd | Polishing Machines'
);

echo '<pre>';
foreach ($urls as $u => $t) {
    $o = get_page_by_path($u, OBJECT, 'suppliers');
    if ($o != null) {
        echo "update wp_posts set post_title = '" . $t . "' where id = " .  $o->ID . " and post_status = 'publish';\n";
    } else {
        echo '-- NOT FOUND ' . $u . "\n";
    }
}
echo '</pre>';