<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

    var $typeArr = array(
        'current' => 1,
        'fixed' => 2,
        'other' => 3,
        'currentLb' => 4,
        'longTerm' => 5,
        'equity' => 6,
        'business' => 7,
        'premises' => 8,
        'equipment' => 9,
        'operations' => 10,
        'capital' => 11,
        'revenues' => 12,
        'goods' => 13,
        'operating' => 14,
        'interest' => 15,
        'handcf' => 16,
        'receiptscf' => 17,
        'goodscf' => 18,
        'operatingcf' => 19,
        'othercf' => 20,
    );
    var $defaultContent = '<p></p>';
    var $menu = array(
        array(
            'menu' => 'Business Summary',
            'content' => 'Business Summary',
            'permission' => 1,
            'child' => array(
                array(
                    'menu' => 'Business Opportunity',
                    'content' => 'Business Opportunity',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Problem Description',
                            'content' => '<p>Here you need to make a summary of what had been written in the Problem Statement section. The summary should consist of what all is required by your customers which they cannot find anywhere else. Your business need not be unique but you will need to specify those reasons that justify the existence of your business. It is possible that the location you have selected is excellent or your pricing has an edge over the other competitors. It is important to appreciate that only once you have addressed all the details you should attempt to write out the executive summary. </p>',
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'The Solution',
                            'content' => "<p>Here you will need to make a summary of whatever was written in The Solution section. The prominent questions that need to be answered are<p><ul style='color:#999;line-height: 2;'><li style='list-style-type: lower-alpha;'>What is your solution to the customer's problems and</li><li style='list-style-type: lower-alpha;'>Why are your products or services so critically important for them?</li></ul></p>",
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Market Opportunity',
                            'content' => '<p>Make an incisive summary of Market Opportunity section. Offer a good interpretation of your idea of an ideal customer. Also specify the number of potential customers you are likely to have for the solution you have in mind. See if you can find a yardstick with which you can group your customers into discrete types. </p>',
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Competitive Landscape',
                            'content' => '<p>You will need to make a summary of what had been written in the Competitive Landscape section. Make a list of the various options that your customers have for their problems and in what way is the solution offered by you better than these. </p>',
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Why us?',
                            'content' => '<p>Provide a summary of the Company Name section. Here you will need to spell out all those points that favour the selection of your company in preference to the other competitors. Some of these points will include the skills and experience of your team members. In what ways are the business acumen and the industry connections better in your team mates? How do they excel in matters such as innovations or industry connections and expertise in the subject matter? What sort of professional competence do your key advisors possess? </p>',
                            'permission' => 1,
                        ),
                    )
                ),
                array(
                    'menu' => 'Business Expectations',
                    'content' => 'Business Expectations',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Financial Projections',
                            'content' => '<p>In this space you will need to make a summary of your financial goals. You will have to specify the kind of revenue you think you are likely to make within the first year of the busness. Further, you will need to mention the type of revenue growth you expect within the coming years. An important estimate you will have to provide deals with the profitability expectation for your business. How soon do you expect to break even and start making profits?You may need to specify the reason in case you plan to run your business as a loss making venture. Here, the details you will provide will also include the important metrics that would bear watching. The projected financial statements may well be seen by your readers later on. Your endeavour should be to heighten the interest of your readers to learn more in respect of your company by using this space to review the various highlights of the forecast you have prepared. </p>',
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Financing Required',
                            'content' => '<p>The section Financial Projections will need to be summarized.</p><ul style="color:#999;line-height: 2;"><li style="list-style-type: lower-alpha;line-height: 2;">How will you finance your business?</li><li style="list-style-type: lower-alpha;">Will you need financing from extraneous sources or do you have adequate finances or is it already fully self sufficient?</li></ul>',
                            'permission' => 1,
                        ),
                    )
                ),
            ),
        ),
        array(
            'menu' => 'Business Opportunity',
            'content' => 'Business Opportunity',
            'permission' => 1,
            'child' => array(
                array(
                    'menu' => 'Problem & Solution',
                    'content' => 'Problem & Solution',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Problem worth solving',
                            'content' => '<p>Your customers may have a key problem or a need that has not been met. If your line of business is the common type such as a beauty parlour or a restaurant, please explain as to why your customers have a need to frequently visit the parlour or the eating joint. Is it because your place is cheaper or because you maintain hours that are convenient to your patrons? Is your place situated at a good location or do you meet a necessity that is otherwise not available in your neck of the woods? Such an example could be a late night Latte Coffee Bar or a sandwich bar that is open till the wee hours of the night.</p>',
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Our Solution',
                            'content' => "<p>It is possible that your business has a novel way of solving an existing problem. If this is the case please explain why, in your opinion, is this what the world requires. In what way do the existing solutions not make the grade? Please spell out the innovative nature of your solution. This can be anything from an outstanding breakthrough in medical science or just a mundane item that is common place but impressive nevertheless. This can be a method to iron clothes without the use of electricity or a non-invasive surgery for a critical medical condition. In case your company's pitch is that it tackles diverse problems faced by the customer then you should discuss these in this space. In such a case amend the heading accordingly and call it Problems instead of Problem.</p><p>While discussing the solutions too you will need to explain clearly how your products or services plan to meet the need of your customer. In case of shortage of parking space your solution might be to offer a rental service for bikes that can be dropped off and picked up at designated spots both near where the students live and where they go to attend their classes. As in the case of Problems, in this case also you may like to reclassify the topic to the use of the plural for Solution in case your plan is to offer solutions to multiple problems.</p>",
                            'permission' => 1,
                        ),
                    )
                ),
                array(
                    'menu' => 'Target Market',
                    'content' => 'Target Market',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Market Size & Segments',
                            'content' => '<p>You will now need to discuss your target customers. The questions you will need to find answers to include</p><ul style="color:#999;line-height: 2;"><li style="list-style-type: lower-alpha;"> Who are your ideal customers?</li><li style="list-style-type: lower-alpha;"> Who is the target with problems whose solutions you are offering?</li><li style="list-style-type: lower-alpha;"> Is it possible to group the customers into cogent segments with respect to needs, locational areas and aspirations? </li><li style="list-style-type: lower-alpha;">Your reserch should indicate approximate figures in each segment.</li></ul><p>In case you run a gymnasium downtown you may find that different sets of customers may want to use your facility at different times of the day. These sets could be the professionals, the retired people and the college students from the nearby area. Your entire solution must take cognizance of the needs and paying capacities of your customers as well as their requirements in terms of laundry services among others. </p><p>It is important to size your segments. You must assess how lucrative your business in likely to be and this will depend on your customer size in each segment and the paying capcity. If the likely income is inadequate your business might not grow. </p>',
                            'permission' => 1,
                        )
                    )
                ),
                array(
                    'menu' => 'Competition',
                    'content' => 'Competition',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Current Alternatives',
                            'content' => '<p>You will need to discuss the competitive environment next. Discuss the kind of competition you have, who these ompetitors are and what are the kinds of solutions they have on offer similar to your solutions. Discuss also why in your opionion the customers might select their solution. </p><p>It is also possible that you may not have any competition in your field. This is fairly common with most of the newer startup innovative companies. The old stalwarts such as Ford did not have any competitors in their field back then. Their customers used whatever state transport was available. Pioneers such as Ford and Sony had to find a way to beat the existing alternatives. Therefore, in case you do not have any competitors just yet, it will still be necessary to debate on the method or methods used by your customers to solve their problem or problems. It is being wise to acknowledge the fact that competition is around the corner even if it is not available right now. You will always need to stay ahead of the race. For this reason you must identify the various advantages you have over all your competitors or alternatives that exist in the market. You will also need to assess whether your products and services enjoy a price advantage in your competitive environment. In case this is not true then you will have to find out why your customers will opt for your solution. The next choice might well be that your solution is better or faster or that your product lasts longer or tastes better. Your outlet might be very conveniently located or your customer service might be better. It is also feasible that your offer suits a certain class of customers.</p>',
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Our Advantages',
                            'content' => '<p>It is possible that the advantages you have are different for diverse customers. An example could be that of offering expensive notebooks bound in leather as against the cheaper and coarser paper kind available elsewhere. These will be attractive to the right kind of customers. When you compare the same product against tablets with software your product may appeal to customers that favour the joy of writing on paper and the absence of need for a cord and power outlet. </p>',
                            'permission' => 1,
                        ),
                    )
                ),
            ),
        ),
        array(
            'menu' => 'Execution',
            'content' => 'Execution',
            'permission' => 1,
            'child' => array(
                array(
                    'menu' => 'Marketing & Sales',
                    'content' => 'Marketing & Sales',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Marketing Plan',
                            'content' => "<p>In this space you will need to discuss your marketing plan components.</p><ul style='color:#999;line-height: 2;'><li style='list-style-type: lower-alpha;'>What will be your marketing strategy for the purpose of increasing your customer base? </li><li style='list-style-type: lower-alpha;'>Will you invest in SEO, TV time or social media, radio commercial time or in email, signages and digital advertising? </li><li style='list-style-type: lower-alpha;'>Do you have or are you planning to have a logo and brand?</li></ul><p>At this stage you will need to select from the above and have estimates and ensure that your forecast includes these figures. </p><p>In case you are planning on advertising, you will need to concentrate on the message you wish to get across. What do you want your USP to be? Is is that you want to vibe with your customers? Discuss how this pitch compares with that of your competitors. Do you want your pitch to be that of a low cost option for those that are conscious of their budget? Or do you wish to project your company's brand image of a superior product? You may also indicate to your customers that your product is of a special sort such as a solution that is eco-friendly or one that is faster, a solution that is easier and more convenient or one that is locally sourced. Of course all this must be in sync with what you have already committed in the Competitive Landscape Section.</p><p>Discuss your plans of distribution and pricing. What is the manner in which your customers will pay for your products and/or services? Will you expect them to pay at the store or in the field? Or do you want that they should pay at your website? The other options could be payment at the retailers or distribuiters or the resellers. The other point you may clarify is whether your customers are those that buy and use your products or will you sell your products to another company or companies that will include your solution along with theirs? Do you expect that your customers pay up for their purchase each time or will this be a continuous arrangement? There is obviously a fair amount to discuss in this space as can be seen. Additional topics may also be added to this section depending upon the size of your business and its complexity. In such a case it may be more convenient to simply discuss the major points in this space and only refer to all the other points for greater detail. For the smaller businesses however, one can cover all the major issues quite adequately here. </p>",
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Sales Plan',
                            'content' => '<p>You will need to discuss the manner in which you will sell your products and/or services. It is not necessary to discuss all the activities related to marketing in this space like how you plan to attract all your customers to be. All you need to focus on is how you wish to convert all your likely customers into actuals. These likely customers are those who turn up and ask questions and request for a newsletter and those that ask you for an estimate. So, how do you plan to make all these people your customers. While this may not be too difficult a problem in the smaller businesses it may need a greater degree of working in the case of a business such as insurance or enterprise software where you will need to discuss the finer details of the sales process. In such a case you may need to talk about your staffing needs and whether you have a commission structure. You may discuss your sales territories and quotas or describe the kind of sales activities you will have to use in order to build and maintain your sales process. These may be follow up calls and emails or planning networking events and trade associations as well as referrals among others. </p>',
                            'permission' => 1,
                        ),
                    )
                ),
                array(
                    'menu' => 'Business Operations',
                    'content' => 'Business Operations',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Locations & Facilities',
                            'content' => "<p>In this space you have to give details of the physical locations of your company. This may well be your office or the place where your store is located or the plants for manufacture or the place where you store all your products. It can be any location that is related to your business. What is the kind of total space you have and how does this relate to the present and future needs of your company? It is quite possible that location is an important factor in your kind of business that may well be a cinema hall or bowling alley or a restaurant. In such a case you will need to explain how the location benefits your business. Are you able to attract a lot of traffic or pedestrians that pass by? Is your location favourable to your target customers? Does your location make it easy for you to run your business such as if it is close to the freeway or a shipping port? Further, in case you operate from home you will need to discuss how this is working well for you or are you thinking of moving out to a new office later on? In case you are,you may give details of when and why. </p>",
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Technology',
                            'content' => '<p>Your business may demand the use of some software or hardware or IT tool. You may have been using these tools or may be intending to use them in the future. Please discuss these tools here.</p>',
                            'permission' => 1,
                        ),
                    )
                ),
                array(
                    'menu' => 'Milestones & Metrics',
                    'content' => 'Milestones & Metrics',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Milestones',
                            'content' => '',
                            'permission' => 0,
                        ),
                        array(
                            'menu' => 'Key Metrics',
                            'content' => '<p>In this space you will need to explain the performance parameters that are critical to you.</p><ul style="color:#999;line-height: 2;"><li style="list-style-type: lower-alpha;">In your perception how do you view success?</li><li style="list-style-type: lower-alpha;">How will you know when you are successful?</li><li style="list-style-type: lower-alpha;">In your view is it critical to keep a check on the direct costs in an industry that works on low margin?</li><li style="list-style-type: lower-alpha;">Will you consider your business to be successful if you had adequate leads that help sustain your sales pipeline to its full capacity?</li><li style="list-style-type: lower-alpha;">Do you need to have a certain sum of money in your bank for you to feel success?</li><li style="list-style-type: lower-alpha;">Are you looking for your website with some flow or see hits being converted into customers?</li></ul><p>Your goal should be to monitor the progress of your plan by continuously tracking the actual results so that you are able to focus on bad assumptions and poor performance quickly enough. This will give you time to do a mid-course correction so that your business remains on track. What you need to do is to find out which of the performance parameters need to be watched with care. </p>',
                            'permission' => 1,
                        )
                    )
                ),
            ),
        ),
        array(
            'menu' => 'Company',
            'content' => 'Company',
            'permission' => 1,
            'child' => array(
                array(
                    'menu' => 'Overview',
                    'content' => 'Overview',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Ownership & Structure',
                            'content' => '<p>Here the specifics of the owner or owners have to be explained. While explaining multiple partnerships please mention the percentage share of each in the business. You will also need to discuss the legal structure of your company as to whether it is on the basis of a sole proprietor or it is based on a partnership in the form of a limited liability partnership. It can also be a partnership firm wherein the profits are passed on to individual partners. It is possible that you are only just beginning and you may not be totally familiar with all these options. In such a case please carry out an online search for various types of business structures and this will give you adequate reading material on the advantages and disadvantages of the different options.</p>',
                            'permission' => 1,
                        )
                    )
                ),
                array(
                    'menu' => 'Team',
                    'content' => 'Team',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Management Team',
                            'content' => '<p> For discussing the management team you will need to give the details of the team first. Thereafter, you will need to write out the skills and experience of each team member besides how they will be contributing towards the running of the company business. The details will include the ways in which the members add strength to the company. In case the members have any special qualifications or an experience in the field of interest this will be explained. This space has to be well utilised detailing your strength and that of your team members. If it is true that you have an amazing plan this is where you will show how you are the perfect person to exploit it. In case you are the sole owner of the company, you will have to discuss all your experience and skills as well as the successes you may have had in the past. You may also wish to change the name of this section so that the term of team or team members is avoided since you are the sole proprietor. </p>',
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Advisors',
                            'content' => '<p>In this space you will discuss all the mentors and investors as well as the professors or the experts from the industry or the subject matter besides friends who are knowledgeable and members of the family among others that have helped you in the business. Give the details of the person or group of persons who you would turn to for advice whenever you have a query or come across a new kind of challenge faced by the business. Explain also the reason why such people are a great help to you and your company. </p>',
                            'permission' => 1,
                        ),
                    )
                ),
            ),
        ),
        array(
            'menu' => 'Financial Plan',
            'content' => 'Financial Plan',
            'permission' => 1,
            'child' => array(
                array(
                    'menu' => 'Forecast',
                    'content' => 'Forecast',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Key Assumptions',
                            'content' => '<p>Here you will need to justify the values you obtained in your financial forecast. You will need to explain whether you projected your revenue figures by basing these on your past results or market research and a good guess extrapolating from the number of people that visit your store and the percentage of these that may buy or did you use any other method? You will also need to explain the kind of growth that is being assumed, the notable expenditure and the important hires. You may also indicate the level of profit you hope to generate. It will be possible for your readers to see the details of the forecast in your plan. Please make use of this space to create the actual story behind the numbers mentioned. You may also like to indicate the manner in which the financial projections corroborate your conviction that this opportunity is a strong one that is totally deserving of your investment and time. </p>',
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Revenue',
                            'content' => '',
                            'permission' => 0,
                        ),
                        array(
                            'menu' => 'Expenses By Year',
                            'content' => '',
                            'permission' => 0,
                        ),
                        array(
                            'menu' => 'Net Profit and Loss',
                            'content' => '',
                            'permission' => 0,
                        ),
                    )
                ),
                array(
                    'menu' => 'Financing',
                    'content' => 'Financing',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Use Of funds',
                            'content' => '<p>This space is to be used for you to explain what you propose to do with all forms of financing such as loans and investments that you might have mentioned in your forecast. You may also clarify if these will help cover all the operating costs during the process of scaling up of your new business. You may also explain if this will help finance different forms of capital expenditure that might include the purchase of new and expensive equipment. Please explain to your readers why you will need all these funds and how these will be paid off.</p>',
                            'permission' => 1,
                        ),
                        array(
                            'menu' => 'Sources of funds',
                            'content' => '<p>In this space you may please discuss your financing plans. Do you plan to invest your own money? Will you be using a credit card or a line of credit? What are the other kinds of funds do you expect to receive and when do you think you will receive these? Some of these types of funds can be in the form of either personal loan or a business loan and the equity investments that you may receive from others. It is both possible and understandable in case you do not readily have the complete details of the future financing all worked out. All you need to do is to try and explain whatever it is that you know and when you hope to be able to sort out all the details. In case financing is not being sought you may use the space above to give out your plans of bootstrapping your company that is the funding of the growth of the company from its own profits.</p>',
                            'permission' => 1,
                        ),
                    )
                ),
                array(
                    'menu' => 'Statements',
                    'content' => 'Statements',
                    'permission' => 1,
                    'child' => array(
                        array(
                            'menu' => 'Setup Cost',
                            'content' => '',
                            'permission' => 0,
                        ),
                        array(
                            'menu' => 'Income profit and lose',
                            'content' => '',
                            'permission' => 0,
                        ),
                        array(
                            'menu' => 'Cashflow',
                            'content' => '',
                            'permission' => 0,
                        ),
                        array(
                            'menu' => 'Balance Sheet',
                            'content' => '',
                            'permission' => 0,
                        ),
                    )
                ),
            ),
        ),
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('Plan_model', 'plan');
        $this->load->model('Login_model', 'b_login');
        $this->load->model('Forecast_model', 'forecast');
        $this->load->model('Pitch_model', 'b_pitch');
        $this->load->model('Company_model', 'company');
        $this->load->library('Assets', 'assets');
        $companyId = $this->session->userdata('companyid');
    }

    public function company() {
        $companyId = $this->session->userdata('companyid');
        if (empty($companyId)) {
            redirect('dashboard');
        }
        $this->_newMenu($this->menu, $companyId);
        $menu = $this->_getMenu($companyId);
        $data = array(
            'pageTitle' => 'Plan',
            'mainContent' => 'plan/index',
            'menu' => $menu,
            'menuParent' => '',
            'menu_type' => 'plan',
            'sub_menu' => 'add',
            'companyid' => $companyId,
            'addLink' => 'forecast/setupcost/' . $companyId
        );
        if (isset($menu[0])) {
            $menuCategory = key($menu[0]);
            if (isset($menu[$menuCategory])) {
                $data['menuParent'] = $menuCategory;
                $menuSubcategory = key($menu[$menuCategory]);
                if ($menuSubcategory) {
                    $data['next'] = $this->_getNext($menuSubcategory, $companyId);
                    $data['previous'] = $this->_getPrevious($menuSubcategory, $companyId);
                    $data['menuid'] = $menuSubcategory;
                    $data['pageTitle'] = 'Plan Subcategory';
                    $data['mainContent'] = 'plan/subcategory';
                    $data['chapter'] = $this->plan->getPlanMenu(array('companyid' => $companyId, 'status' => 1, 'menuid' => $menuSubcategory), 'menuid')->row('title');
                    $data['links'] = $this->plan->getPlanMenu(array('companyid' => $companyId, 'status' => 1, 'parentid' => $menuSubcategory), 'menuid')->result();
                }
            }
        }
        $this->load->view('layout/planLayout', $data);
    }

    public function cover() {
        $companyId = $this->session->userdata('companyid');
        $user_id = $this->session->userdata('user_id');
        $this->load->helper('form');
        if (empty($companyId)) {
            redirect('dashboard');
        }
        $where = array(
            'user_id' => $user_id,
            'company_id' => $companyId
        );
        $company_name = $this->b_login->select_data('biz_company', $where);
        $comp_data = $company_name->row();
        $company = $comp_data->name;
        $data = array(
            'pageTitle' => 'Cover Page',
            'cover' => array('company' => '', 'slogan' => '', 'street' => '', 'city' => '', 'state' => '', 'postal' => '', 'country' => '', 'contact' => '', 'email' => '', 'phone' => '', 'message' => ''),
            'mainContent' => 'plan/cover',
            'menu_type' => 'plan',
            'sub_menu' => 'cover',
            'companyid' => $companyId,
            'company_name' => $company,
            'addLink' => 'forecast/setupcost/' . $companyId
        );
        $coverDetails = $this->plan->getPlanCover(array('companyid' => $companyId));
        $count = $coverDetails->num_rows();
        if ($count) {
            $data['cover'] = $coverDetails->row_array();
        }
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->_addCover($count, $companyId, $company);
        }
        $this->load->view('layout/planCoverLayout', $data);
    }

    public function preview() {
        $companyId = $this->session->userdata('companyid');
        $data = array(
            'pageTitle' => 'Preview Page',
            'mainContent' => 'plan/cover_page',
            'menu_type' => 'plan',
            'sub_menu' => 'preview',
            'companyid' => $companyId,
            'addLink' => 'forecast/setupcost/' . $companyId,
            'value' => $this->plan->getPlanCover(array('companyid' => $companyId))
        );
        $this->load->view('layout/planCoverLayout', $data);
    }

    private function _addCover($count, $companyId, $company) {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
        $postalValidation = (!empty($_POST['postal'])) ? '|integer' : '';
        $phoneValidation = (!empty($_POST['phone'])) ? '|integer' : '';
        $validation = array(
            array('field' => 'company', 'label' => 'Company Name', 'rules' => 'trim|required|max_length[100]'),
            array('field' => 'slogan', 'label' => 'Slogan', 'rules' => 'trim|required|max_length[125]'),
            array('field' => 'street', 'label' => 'Street', 'rules' => 'trim|max_length[50]'),
            array('field' => 'city', 'label' => 'City', 'rules' => 'trim|max_length[50]'),
            array('field' => 'state', 'label' => 'State', 'rules' => 'trim|max_length[50]'),
            array('field' => 'postal', 'label' => 'Postal Code', 'rules' => 'trim' . $postalValidation . '|max_length[10]'),
            array('field' => 'country', 'label' => 'Country', 'rules' => 'trim|max_length[50]'),
            array('field' => 'contact', 'label' => 'Contact', 'rules' => 'trim|required|max_length[15]'),
            array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|max_length[50]'),
            array('field' => 'phone', 'label' => 'Phone', 'rules' => 'trim' . $phoneValidation . '|max_length[15]'),
            array('field' => 'message', 'label' => 'Message', 'rules' => 'trim|max_length[100]'),
        );
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run()) {
            $curDate = date('y-m-d H:i:s');
            $userId = $this->session->userdata('user_id');
            if (!$count) {
                $insertArr = array(
                    'companyid' => $companyId,
                    'company' => $company,
                    'slogan' => $post['slogan'],
                    'street' => $post['street'],
                    'city' => $post['city'],
                    'state' => $post['state'],
                    'postal' => $post['postal'],
                    'country' => $post['country'],
                    'contact' => $post['contact'],
                    'email' => $post['email'],
                    'phone' => $post['phone'],
                    'message' => $post['message'],
                    'created_by' => $userId,
                    'created_on' => $curDate,
                    'created_on' => $curDate,
                    'modified_by' => $userId,
                    'modified_on' => $curDate,
                );
                $result = $this->plan->setPlanCover($insertArr);
                if ($result) {
                    $this->session->set_flashdata('success', 'Cover has been created successfully!');
                } else {
                    $this->session->set_flashdata('error', 'Unable to create cover. please try again.');
                }
            } else {
                $updateArr = array(
                    'company' => $company,
                    'slogan' => $post['slogan'],
                    'street' => $post['street'],
                    'city' => $post['city'],
                    'state' => $post['state'],
                    'postal' => $post['postal'],
                    'country' => $post['country'],
                    'contact' => $post['contact'],
                    'email' => $post['email'],
                    'phone' => $post['phone'],
                    'message' => $post['message'],
                    'modified_by' => $userId,
                    'modified_on' => $curDate,
                );
                $result = $this->plan->updatePlanCover($updateArr, array('companyid' => $companyId));
                if ($result) {
                    $this->session->set_flashdata('success', 'Cover Page has been updated successfully!');
                } else {
                    $this->session->set_flashdata('error', 'Unable to update cover. please try again.');
                }
            }
            redirect('Plan/cover/' . $companyId);
        }
    }

    public function addmore($companyId = NULL, $parentid = 0) {
        $comp_id = $this->session->userdata('companyid');
        $companyId = isset($comp_id) ? $comp_id : $companyId;
        $data = array(
            'pageTitle' => 'Add More',
            'parentid' => $parentid,
            'mainContent' => 'plan/addmore',
            'menuParent' => $parentid,
            'companyid' => $companyId,
            'menu_type' => 'plan',
            'sub_menu' => 'add',
            'addLink' => 'forecast/setupcost/' . $companyId,
            'chapter' => ($parentid) ? $this->plan->getPlanMenu(array('companyid' => $companyId, 'status' => 1, 'menuid' => $parentid), 'menuid')->row('title') : 'Plan',
        );
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->_addMenu($parentid);
        }
        $data['menu'] = $this->_getMenu($companyId);
        $data['links'] = $this->plan->getPlanMenu(array('companyid' => $companyId, 'parentid' => $parentid), 'menuid')->result();
        $this->load->view('layout/planLayout', $data);
    }

    public function subcategory($companyId = NULL, $menuid = NULL) {
        $comp_id = $this->session->userdata('companyid');
        $companyId = isset($comp_id) ? $comp_id : $companyId;
        $data = array(
            'menuid' => $menuid,
            'pageTitle' => 'Plan Subcategory',
            'addLink' => 'plan',
            'mainContent' => 'plan/subcategory',
            'menu_type' => 'plan',
            'sub_menu' => 'add',
            'companyid' => $companyId,
            'menuParent' => $this->plan->getPlanMenu(array('companyid' => $companyId, 'menuid' => $menuid))->row('parentid'),
            'chapter' => $this->plan->getPlanMenu(array('companyid' => $companyId, 'status' => 1, 'menuid' => $menuid), 'menuid')->row('title'),
//            'sub_chapter' => $this->plan->get_category()
        );
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->_updateSummary($menuid);
        }
        $data['menu'] = $this->_getMenu($companyId);
        $data['links'] = $this->plan->getPlanMenu(array('companyid' => $companyId, 'status' => 1, 'parentid' => $menuid), 'menuid')->result();
        foreach ($data['links'] as $key => $link) {
            switch ($link->hidden_title) {
                case 'Milestones':
                    $link->content = $this->_getMilestones();
                    break;
                case 'Revenue':
                    $link->content = $this->_getRevenue();
                    break;
                case 'Expenses By Year':
                    $link->content = $this->_getExpense();
                    break;
                case 'Net Profit and Loss':
                    $link->content = $this->_getProfit();
                    break;
                case 'Setup Cost':
                    $link->content = $this->_getSetupcost();
                    break;
                case 'Income profit and lose':
                    $link->content = $this->_getIncome();
                    break;
                case 'Cashflow':
                    $link->content = $this->_getCashflow();
                    break;
                case 'Balance Sheet':
                    $link->content = $this->_getBalanceSheet();
                    break;
            }
            $data['links'][$key]->content = $link->content;
        }
        $data['previous'] = $this->_getPrevious($menuid, $companyId);
        $data['next'] = $this->_getNext($menuid, $companyId);
        $this->load->view('layout/planLayout', $data);
    }

    public function ajax() {
        $output = array();
        $get = $this->input->get();
        $post = $this->input->post();
        $curDate = date('Y-m-d H:i:s');
        $userId = 1;
        $companyId = $this->session->userdata('companyid');
        if ($get['action'] == 'update') {
//            $companyId = $this->input->get('companyid');
            $updateArr = array(
                'modifiedby' => $userId,
                'modifiedon' => $curDate,
            );
            if ($get['submit'] == 1) {
                $updateArr['title'] = trim($post['title']);
                $message = 'Selected link has been updated succcessfully';
            } else if ($get['submit'] == 2) {
                $updateArr['status'] = 0;
                $message = 'Selected link has been de-activated succcessfully';
            } else if ($get['submit'] == 3) {
                $updateArr['status'] = 1;
                $message = 'Selected link has been activated succcessfully';
            }
            $result = $this->plan->updatePlanMenu($updateArr, array('menuid' => $post['menuid']));
            $output['status'] = ($result) ? 1 : 0;
            $output['menuParent'] = $this->getParentMenu($post['menuid']);
        } else if ($get['action'] == 'add') {
//            $companyId = $this->input->get('companyid');
            $insertArr = array(
                'companyid' => $companyId,
                'title' => trim($post['add']),
                'hidden_title' => trim($post['add']),
                'content' => $this->defaultContent,
                'permission' => 1,
                'parentid' => $post['parentid'],
                'status' => 1,
                'createdby' => $userId,
                'createdon' => $curDate,
                'modifiedby' => $userId,
                'modifiedon' => $curDate,
            );
            $message = 'Selected link has been added succcessfully';
            $result = $this->plan->setPlanMenu($insertArr);
            $output['addedid'] = $this->db->insert_id();
            $output['status'] = ($result) ? 1 : 0;
            $output['menuParent'] = $this->getParentMenu($post['parentid']);
        } else if ($get['action'] == 'summary') {
            $menuid = $this->input->post('menuid');
            $summary = $this->input->post('summary');
            $updateArr = array(
                'summary' => $summary,
                'modifiedby' => $userId,
                'modifiedon' => $curDate,
            );
            $result = $this->plan->updatePlanMenu($updateArr, array('menuid' => $menuid));
            $message = ($result) ? 'Success' : 'Failed';
            $output['summary'] = $summary;
            $output['menuParent'] = $this->getParentMenu($menuid);
        }
        $output['message'] = $message;
        $output['menu'] = $this->_getMenu($companyId);
        echo json_encode($output);
        exit();
    }

    private function _updateSummary($menuid) {
        $post = $this->input->post();
        $curDate = date('Y-m-d H:i:s');
        $userId = 1;
        $updateArr = array(
            'summary' => trim($post['summary']),
            'modifiedby' => $userId,
            'modifiedon' => $curDate,
        );
        $result = $this->plan->updatePlanMenu($updateArr, array('menuid' => $post['menuid']));
        if ($result) {
            $this->session->set_flashdata('success', 'Summary has been updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Unable to update summary. please try again.');
        }
        return redirect('Plan/subcategory/' . $menuid);
    }

    private function _addMenu($parentid) {
        $post = $this->input->post();
        $curDate = date('Y-m-d H:i:s');
        $userId = 1;

        if ($post['submit'] == 4) {
            $insertArr = array(
                'companyid' => $companyId,
                'title' => trim($post['add']),
                'hidden_title' => trim($post['add']),
                'content' => $this->defaultContent,
                'permission' => 1,
                'parentid' => $parentid,
                'status' => 1,
                'createdby' => $userId,
                'createdon' => $curDate,
                'modifiedby' => $userId,
                'modifiedon' => $curDate,
            );
            $result = $this->plan->setPlanMenu($insertArr);
            if ($result) {
                $this->session->set_flashdata('success', 'Selected link has been added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Unable to add the selected link. please try again.');
            }
        } else {
            $updateArr = array(
                'modifiedby' => $userId,
                'modifiedon' => $curDate,
            );
            if ($post['submit'] == 1) {
                $updateArr['title'] = $post['title'];
                $message = 'Selected link has been updated succcessfully';
            } else if ($post['submit'] == 2) {
                $updateArr['status'] = 0;
                $message = 'Selected link has been de-activated succcessfully';
            } else if ($post['submit'] == 3) {
                $updateArr['status'] = 1;
                $message = 'Selected link has been activated succcessfully';
            }
            $result = $this->plan->updatePlanMenu($updateArr, array('menuid' => $post['menuid']));
            if ($result) {
                $this->session->set_flashdata('success', $message);
            } else {
                $this->session->set_flashdata('error', 'Unable to update the selected link. please try again.');
            }
        }
        return redirect('Plan/addmore/' . $parentid);
    }

    private function _getMenu($companyId) {
        $mainMenu = array();
        $allMenus = $this->plan->getPlanMenu(array('companyid' => $companyId, 'status' => 1), 'menuid')->result();
        foreach ($allMenus as $menu) {
            $mainMenu[$menu->parentid][$menu->menuid] = $menu->title;
        }
        return $mainMenu;
    }

    private function _newMenu($menu, $companyId) {
        $userId = $this->session->userdata('user_id');
        $curDate = date('Y-m-d H:i:s');

        $menuCount = $this->plan->getPlanMenu(array('companyid' => $companyId))->num_rows();
        if (!$menuCount) {
            foreach ($menu as $category) {
                $parentid = 0;
                $insertArr = array(
                    'companyid' => $companyId,
                    'title' => $category['menu'],
                    'hidden_title' => $category['menu'],
                    'content' => $category['content'],
                    'permission' => $category['permission'],
                    'parentid' => $parentid,
                    'status' => 1,
                    'createdby' => $userId,
                    'createdon' => $curDate,
                    'modifiedby' => $userId,
                    'modifiedon' => $curDate,
                );
                $this->plan->setPlanMenu($insertArr);

                $insertid = $this->db->insert_id();
                foreach ($category['child'] as $subcategory) {
                    $parentid = $insertid;
                    $insertArr = array(
                        'companyid' => $companyId,
                        'title' => $subcategory['menu'],
                        'hidden_title' => $subcategory['menu'],
                        'content' => $subcategory['content'],
                        'permission' => $subcategory['permission'],
                        'parentid' => $parentid,
                        'status' => 1,
                        'createdby' => $userId,
                        'createdon' => $curDate,
                        'modifiedby' => $userId,
                        'modifiedon' => $curDate,
                    );
                    $this->plan->setPlanMenu($insertArr);

                    $parentid = $this->db->insert_id();
                    foreach ($subcategory['child'] as $title) {
                        $insertArr = array(
                            'companyid' => $companyId,
                            'title' => $title['menu'],
                            'hidden_title' => $title['menu'],
                            'content' => $title['content'],
                            'permission' => $title['permission'],
                            'parentid' => $parentid,
                            'status' => 1,
                            'createdby' => $userId,
                            'createdon' => $curDate,
                            'modifiedby' => $userId,
                            'modifiedon' => $curDate,
                        );
                        $this->plan->setPlanMenu($insertArr);
                    }
                }
            }
        }
    }

    public function getParentMenu($menuid) {
        $parentid = $this->plan->getPlanMenu(array('menuid' => $menuid))->row('parentid');
        if ($parentid == 0) {
            return $menuid;
        } else {
            return $this->getParentMenu($parentid);
        }
    }

    private function _getMilestones() {
        $userid = $this->session->userdata('user_id');
        $company_id = $this->session->userdata('companyid');
        $data = $this->b_pitch->get_milestonedetail($company_id);
        $count = $data->num_rows();
        $value = $data->result();
        $html = '<div class = "show_chart" style = "height:55px">
            <button class = "btn btn-warning btn-md mile_button pull-right" href = "#milestone" data-target = "#milestone" data-toggle = "modal" type = "button">Add a Milestone</button></div><div class = "panel panel-default panel-table">
            <div class = "panel-heading">
            <div class = "row">
            <div class = "col col-xs-6">
            <h3 class = "panel-title">Milestone</h3>
            </div>
            </div>
            </div>
            <div class = "panel-body milestones_detail">
            <table id = "milestones" class = "table table-striped table-bordered table-list milestones">
            <thead>
            <tr>
            <th class = "hidden-xs">No</th>
            <th>Milestone Name</th>
            <th>Milestone Date</th>
            <th>Description</th>
            <th>Options</th>
            </tr>
            </thead>';
        if ($count > 0) {
            $html .='<tbody>';
            $count = 1;
            foreach ($value as $val) {
                $html .='<tr data-status = "disabled">
            <td class = "hidden-xs text-center">' . $count . '</td>
            <td> ' . $val->name . '</td>
            <td> ' . $val->date . '</td>
            <td> ' . $val->description . '</td>
            <td align = "center" class = "text-left">
            <a onclick = "milestone_edit(this,' . $val->id . ')" title = "Edit" data-placement = "top" data-toggle = "tooltip" class = "btn btn-default"><em class = "fa fa-pencil"></em></a>
            <a onclick = "milestone_delete(' . $val->id . ',2)" title = "Delete" data-placement = "top" data-toggle = "tooltip" class = "btn btn-default"><em class = "fa fa-trash"></em></a>
            </td>
            </tr>';
                $count++;
            }
            $html .='</tbody>';
        } else {
            $html .='<tr><td id = "ext-gen1019" class = " text-center" valign = "top" colspan = "5">No Milestones found!!</td></tr>';
        }
        $html .='</table>
            </div>
            </div>';
        return $html;
    }

    private function _getRevenue() {
        $userid = $this->session->userdata('user_id');
        $company_id = $this->session->userdata('companyid');
        $data = $this->forecast->gettotal($company_id, '12');
        $count = $data->num_rows();
        if (!empty($count)) {
            $value = $data->row();
            $fy1 = $value->fy1;
            $fy2 = $value->fy2;
            $fy3 = $value->fy3;
            $fy4 = $value->fy4;
            $fy5 = $value->fy5;
        } else {
            $fy1 = '0';
            $fy2 = '0';
            $fy3 = '0';
            $fy4 = '0';
            $fy5 = '0';
        }
        $script = '<div class="show_chart">
                <a href="' . base_url() . 'forecast/statement/' . $company_id . '">
                <button class="btn btn-warning pull-right">Go to Forecast</button>
                </a>
                </div>';
        if (!empty($fy1) || !empty($fy2) || !empty($fy3) || !empty($fy4) || !empty($fy5)) {
            $script .= $this->_getscript('chart_div1', $data, '#E1AEF2', 'drawChart', 'Revenue');
        } else {
            $script .='<div class="no-content text-center"><span class="text-center">No revenues data found</span></div>';
        }
        return $script;
    }

    private function _getExpense() {
        $userid = $this->session->userdata('user_id');
        $company_id = $this->session->userdata('companyid');
        $data = $this->forecast->gettotal($company_id, '14');
        $count = $data->num_rows();
        if (!empty($count)) {
            $value = $data->row();
            $fy1 = $value->fy1;
            $fy2 = $value->fy2;
            $fy3 = $value->fy3;
            $fy4 = $value->fy4;
            $fy5 = $value->fy5;
        } else {
            $fy1 = '0';
            $fy2 = '0';
            $fy3 = '0';
            $fy4 = '0';
            $fy5 = '0';
        }
        $script = '<div class="show_chart">
                <a href="' . base_url() . 'forecast/statement/' . $company_id . '">
                <button class="btn btn-warning pull-right">Go to Forecast</button>
                </a>
                </div>';
        if (!empty($fy1) || !empty($fy2) || !empty($fy3) || !empty($fy4) || !empty($fy5)) {
            $script .= $this->_getscript('chart_div2', $data, '#A9E858', 'drawChart1', 'Cost & Expense');
        } else {
            $script .='<div class="no-content text-center"><span class="text-center">No Cost & Expense data found</span></div>';
        }
        return $script;
    }

    private function _getProfit() {
        $userid = $this->session->userdata('user_id');
        $company_id = $this->session->userdata('companyid');
        $data = $this->forecast->getincome($company_id, '6');
        $count = $data->num_rows();
        if (!empty($count)) {
            $value = $data->row();
            $fy1 = $value->fy1;
            $fy2 = $value->fy2;
            $fy3 = $value->fy3;
            $fy4 = $value->fy4;
            $fy5 = $value->fy5;
        } else {
            $fy1 = '0';
            $fy2 = '0';
            $fy3 = '0';
            $fy4 = '0';
            $fy5 = '0';
        }
        $script = '<div class="show_chart">
                <a href="' . base_url() . 'forecast/statement/' . $company_id . '">
                <button class="btn btn-warning pull-right">Go to Forecast</button>
                </a>
                </div>';
        if (!empty($fy1) || !empty($fy2) || !empty($fy3) || !empty($fy4) || !empty($fy5)) {
            $script .= $this->_getscript('chart_div3', $data, '#6AE89E', 'drawChart2', 'Profit & Loss');
        } else {
            $script .='<div class="no-content text-center"><span class="text-center">No Profit data found</span></div>';
        }
        return $script;
    }

    private function _getscript($div, $data, $color, $function, $type) {
        $value = $this->getforecastlength($data, $type);
        $script = '
                        <div id="' . $div . '"></div>
          <style>
                        #' . $div . ' {
                            width        : 50%;
                            height        : 300px;
                            font-size    : 11px;
                            margin-left  :15%;
                        }                   
                        </style>
                        
<script type="text/javascript">
                         google.charts.load("current", {packages: ["corechart"]});

        google.charts.setOnLoadCallback(' . $function . ');
        function ' . $function . '() {
            var data = google.visualization.arrayToDataTable([
               ' . $value . '
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                width: 600,
                height: 300,
                bar: {groupWidth: "60%"},
                legend: {position: "none"},
                colors: ["' . $color . '"],
                annotations: {
                    textStyle: {
                        fontName: "Times-Roman",
                        fontSize: 13,
                        bold: true,
                        color: "#000", // The color of the text outline.
                        opacity: 0.9          // The transparency of the text.
                    },
                    alwaysOutside: true
                },
                vAxis: {
                    gridlines: {color: "transparent"},
                    textPosition: "none"
                },
                hAxis: {
                    textStyle: {
                        color: "black",
                        fontName: "Arial Black",
                        fontSize: 13,
                        bold: true
                    }
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("' . $div . '"));
            chart.draw(view, options);
        }
        </script>';
        return $script;
    }

    private function getforecastlength($data, $type) {
        $count = $data->num_rows();
        if (!empty($count)) {
            $value = $data->row_array();
        } else {
            $value['fy1'] = '0';
            $value['fy2'] = '0';
            $value['fy3'] = '0';
            $value['fy4'] = '0';
            $value['fy5'] = '0';
        }

        $company_id = $this->session->userdata('companyid');
        $pitch_details = $pitch = $this->b_pitch->get_alldetails($company_id);
        $f_length = $pitch[0]['forecast_length'];
        $f_date = $pitch[0]['forecast_date'];
        $currency = 'Rs';
        $date_val = explode('/', $f_date);
        $date = $date_val[1];
        $revenue_val = '';
        $count = '1';
        $revenue_val .=' ["Element", "' . $type . '", {role: "annotations"}],';
        for ($count = '1'; $count <= $f_length; $count++) {
            $name = "fy.$count";
            $revenue_val .='
                ["FY" + ' . $date . ', ' . $value['fy' . $count] . ', number_format(' . $value['fy' . $count] . ', "' . $currency . '")],';
            $date++;
        }
        return $revenue_val;
    }

    private function _getNext($menuid, $companyId) {
        $menuDetails = $this->plan->getPlanMenu(array('menuid' => $menuid, 'companyid' => $companyId), 'menuid', 'ASC')->row();
        $menuNext = $this->plan->getPlanMenu(array('menuid >' => $menuid, 'parentid' => $menuDetails->parentid, 'status' => 1, 'companyid' => $companyId), 'menuid', 'ASC');
        if ($menuNext->num_rows()) {
            return $menuNext->row('menuid');
        } else {
            return $this->_getNextParent($menuDetails->parentid, $companyId);
        }
    }

    private function _getNextParent($parentid, $companyId) {
        $nextParent = $this->plan->getPlanMenu(array('menuid >' => $parentid, 'parentid' => 0, 'status' => 1, 'companyid' => $companyId), 'menuid', 'ASC');
        if ($nextParent->num_rows()) {
            $menuNext = $this->plan->getPlanMenu(array('parentid' => $nextParent->row('menuid'), 'status' => 1, 'companyid' => $companyId), 'menuid', 'ASC');
            if ($menuNext->num_rows()) {
                return $menuNext->row('menuid');
            } else {
                return $this->_getNextParent($nextParent->row('parentid'), $companyId);
            }
        } else {
            return null;
        }
    }

    private function _getPrevious($menuid, $companyId) {
        $menuDetails = $this->plan->getPlanMenu(array('menuid' => $menuid, 'companyid' => $companyId), 'menuid', 'DESC')->row();
        $menuPrevious = $this->plan->getPlanMenu(array('menuid <' => $menuid, 'parentid' => $menuDetails->parentid, 'status' => 1, 'companyid' => $companyId), 'menuid', 'DESC');
        if ($menuPrevious->num_rows()) {
            return $menuPrevious->row('menuid');
        } else {
            return $this->_getPreviousParent($menuDetails->parentid, $companyId);
        }
    }

    private function _getPreviousParent($parentid, $companyId) {
        $previousParent = $this->plan->getPlanMenu(array('menuid <' => $parentid, 'parentid' => 0, 'status' => 1, 'companyid' => $companyId), 'menuid', 'DESC');
        if ($previousParent->num_rows()) {
            $menuPrevious = $this->plan->getPlanMenu(array('parentid' => $previousParent->row('menuid'), 'status' => 1, 'companyid' => $companyId), 'menuid', 'DESC');
            if ($menuPrevious->num_rows()) {
                return $menuPrevious->row('menuid');
            } else {
                return $this->_getNextParent($previousParent->row('parentid'), $companyId);
            }
        } else {
            return null;
        }
    }

    public function get_niceditimage() {
//Check if we are getting the image
        if (isset($_FILES['image'])) {
            //Get the image array of details
            $img = $_FILES['image'];
            $file_tmp = $img['tmp_name'];
            $size = filesize($file_tmp);
//            if ($size <= '2097152') {
            //The new path of the uploaded image, rand is just used for the sake of it
            $path = "assets/nicedit/" . rand() . $img["name"];

            //Move the file to our new path
            move_uploaded_file($img['tmp_name'], $path);
            //Get image info, reuiqred to biuld the JSON object
            $data = getimagesize($path);
            //The direct link to the uploaded image, this might varyu depending on your script location    
//            $link = "http://$_SERVER[HTTP_HOST]" . "/nicedit/" . $path;
            $link = base_url() . $path;
            //Here we are constructing the JSON Object
            $res = array("upload" => array(
                    "links" => array("original" => $link),
                    "image" => array("width" => $data[0],
                        "height" => $data[1]
                    )
            ));
            //echo out the response :)
            echo json_encode($res);
//            }
        }
    }

    public function _getBalanceSheet($type = NULL) {
        $companyId = $this->session->userdata('companyid');
        $result = $this->company->getcompany($companyId);
        $data = $result->row();
        $totalYear = $data->forecast_length;
        $data = array(
            'totalYear' => $totalYear,
            'tdClass' => ($totalYear > 3) ? 'col-sm-1' : 'col-sm-2',
            'signArr' => array(0 => 'plus', 1 => 'minus'),
            'currentAssets' => $this->_getDefaultArray($this->assets->currentAssets),
            'fixedAssets' => $this->_getDefaultArray($this->assets->fixedAssets),
            'otherAssets' => $this->_getDefaultArray($this->assets->otherAssets),
            'currentLbAssets' => $this->_getDefaultArray($this->assets->currentLiabilities),
            'longTermAssets' => $this->_getDefaultArray($this->assets->longTermLiabilities),
            'equityAssets' => $this->_getDefaultArray($this->assets->equity),
            'fCA' => $this->assets->currentAssets,
            'fFA' => $this->assets->fixedAssets,
            'fOA' => $this->assets->otherAssets,
            'fCL' => $this->assets->currentLiabilities,
            'fLL' => $this->assets->longTermLiabilities,
            'fE' => $this->assets->equity,
            'sectionArray' => array(
                array('current', 'fixed', 'other'),
                array('currentLb', 'longTerm', 'equity')
            )
        );
        $ca = $this->forecast->getForecast(array('type' => $this->typeArr['current'], 'cid' => $companyId));
        if ($ca->num_rows() > 0) {
            $data['currentAssets'] = $ca->result_array();
        }
        $fa = $this->forecast->getForecast(array('type' => $this->typeArr['fixed'], 'cid' => $companyId));
        if ($fa->num_rows() > 0) {
            $data['fixedAssets'] = $fa->result_array();
        }
        $oa = $this->forecast->getForecast(array('type' => $this->typeArr['other'], 'cid' => $companyId));
        if ($oa->num_rows() > 0) {
            $data['otherAssets'] = $oa->result_array();
        }
        $cla = $this->forecast->getForecast(array('type' => $this->typeArr['currentLb'], 'cid' => $companyId));
        if ($cla->num_rows() > 0) {
            $data['currentLbAssets'] = $cla->result_array();
        }
        $lta = $this->forecast->getForecast(array('type' => $this->typeArr['longTerm'], 'cid' => $companyId));
        if ($lta->num_rows() > 0) {
            $data['longTermAssets'] = $lta->result_array();
        }
        if ($type == 'pdf') {
            return $data;
        } else {
            return $this->load->view('forecast/balance_sheet_view', $data, true);
        }
    }

    public function _getSetupcost($type = NULL) {
        $company_id = $this->session->userdata('companyid');
        $result = $this->company->getcompany($company_id);
        $data = $result->row();
        $totalYear = $data->forecast_length;
        $data = array(
            'totalYear' => $totalYear,
            'tdClass' => ($totalYear > 3) ? 'col-sm-1' : 'col-sm-2',
            'signArr' => array(0 => 'plus', 1 => 'minus'),
            'businessSetup' => $this->_getDefaultArray($this->assets->businessSetup),
            'premisesSetup' => $this->_getDefaultArray($this->assets->premisesSetup),
            'equipmentSetup' => $this->_getDefaultArray($this->assets->equipmentSetup),
            'operationsSetup' => $this->_getDefaultArray($this->assets->operationsSetup),
            'capitalSetup' => $this->_getDefaultArray($this->assets->capitalSetup),
            'fBS' => $this->assets->businessSetup,
            'fPS' => $this->assets->premisesSetup,
            'fES' => $this->assets->equipmentSetup,
            'fOS' => $this->assets->operationsSetup,
            'fCS' => $this->assets->capitalSetup,
            'sectionArray' => array(
                array('business', 'premises', 'equipment', 'operations'),
                array('capital'),
            )
        );
        $bs = $this->forecast->getForecast(array('type' => $this->typeArr['business'], 'cid' => $company_id));
        if ($bs->num_rows() > 0) {
            $data['businessSetup'] = $bs->result_array();
        }
        $ps = $this->forecast->getForecast(array('type' => $this->typeArr['premises'], 'cid' => $company_id));
        if ($ps->num_rows() > 0) {
            $data['premisesSetup'] = $ps->result_array();
        }
        $es = $this->forecast->getForecast(array('type' => $this->typeArr['equipment'], 'cid' => $company_id));
        if ($es->num_rows() > 0) {
            $data['equipmentSetup'] = $es->result_array();
        }
        $os = $this->forecast->getForecast(array('type' => $this->typeArr['operations'], 'cid' => $company_id));
        if ($os->num_rows() > 0) {
            $data['operationsSetup'] = $os->result_array();
        }
        $cs = $this->forecast->getForecast(array('type' => $this->typeArr['capital'], 'cid' => $company_id));
        if ($cs->num_rows() > 0) {
            $data['capitalSetup'] = $cs->result_array();
        }
        if ($type == 'pdf') {
            return $data;
        } else {
            return $this->load->view('forecast/setup_cost_view', $data, true);
        }
    }

    public function _getIncome($type = NULL) {
        $company_id = $this->session->userdata('companyid');
        $result = $this->company->getcompany($company_id);
        $data = $result->row();
        $totalYear = $data->forecast_length;
        $data = array(
            'totalYear' => $totalYear,
            'companyid' => $company_id,
            'tdClass' => ($totalYear > 3) ? 'col-sm-1' : 'col-sm-2',
            'signArr' => array(0 => 'plus', 1 => 'minus'),
            'revenuesStatement' => $this->_getDefaultArray($this->assets->revenuesStatement),
            'goodsStatement' => $this->_getDefaultArray($this->assets->goodsStatement),
            'operatingStatement' => $this->_getDefaultArray($this->assets->operatingStatement),
            'interestStatement' => $this->_getDefaultArray($this->assets->interestStatement),
            'fRS' => $this->assets->revenuesStatement,
            'fGS' => $this->assets->goodsStatement,
            'fOS' => $this->assets->operatingStatement,
            'fIS' => $this->assets->interestStatement,
            'sectionArray' => array(
                array('revenues', 'goods'),
                array('capital'),
            )
        );
        $rs = $this->forecast->getForecast(array('type' => $this->typeArr['revenues'], 'cid' => $company_id));
        if ($rs->num_rows() > 0) {
            $data['revenuesStatement'] = $rs->result_array();
        }
        $gs = $this->forecast->getForecast(array('type' => $this->typeArr['goods'], 'cid' => $company_id));
        if ($gs->num_rows() > 0) {
            $data['goodsStatement'] = $gs->result_array();
        }
        $os = $this->forecast->getForecast(array('type' => $this->typeArr['operating'], 'cid' => $company_id));
        if ($os->num_rows() > 0) {
            $data['operatingStatement'] = $os->result_array();
        }
        $is = $this->forecast->getForecast(array('type' => $this->typeArr['interest'], 'cid' => $company_id));
        if ($is->num_rows() > 0) {
            $data['interestStatement'] = $is->result_array();
        }
        if ($type == 'pdf') {
            return $data;
        } else {
            return $this->load->view('forecast/statement_view', $data, true);
        }
    }

    public function _getCashflow($type = NULL) {
        $company_id = $this->session->userdata('companyid');
        $result = $this->company->getcompany($company_id);
        $data = $result->row();
        $totalYear = $data->forecast_length;
        $data = array(
            'totalYear' => $totalYear,
            'companyid' => $company_id,
            'tdClass' => ($totalYear > 3) ? 'col-sm-1' : 'col-sm-2',
            'signArr' => array(0 => 'plus', 1 => 'minus'),
            'handcfCashflow' => $this->_getDefaultArray($this->assets->handcfCashflow),
            'receiptscfCashflow' => $this->_getDefaultArray($this->assets->receiptscfCashflow),
            'goodscfCashflow' => $this->_getDefaultArray($this->assets->goodscfCashflow),
            'operatingcfCashflow' => $this->_getDefaultArray($this->assets->operatingcfCashflow),
            'othercfCashflow' => $this->_getDefaultArray($this->assets->othercfCashflow),
            'fHC' => $this->assets->handcfCashflow,
            'fRC' => $this->assets->receiptscfCashflow,
            'fGC' => $this->assets->goodscfCashflow,
            'fOPC' => $this->assets->operatingcfCashflow,
            'fOC' => $this->assets->othercfCashflow,
            'sectionArray' => array(
                array('goodscf', 'operatingcf', 'othercf'),
                array()
            )
        );
        $hc = $this->forecast->getForecast(array('type' => $this->typeArr['handcf'], 'cid' => $company_id));
        if ($hc->num_rows() > 0) {
            $data['handcfCashflow'] = $hc->result_array();
        }
        $rc = $this->forecast->getForecast(array('type' => $this->typeArr['receiptscf'], 'cid' => $company_id));
        if ($rc->num_rows() > 0) {
            $data['receiptscfCashflow'] = $rc->result_array();
        }
        $gc = $this->forecast->getForecast(array('type' => $this->typeArr['goodscf'], 'cid' => $company_id));
        if ($gc->num_rows() > 0) {
            $data['goodscfCashflow'] = $gc->result_array();
        }
        $opc = $this->forecast->getForecast(array('type' => $this->typeArr['operatingcf'], 'cid' => $company_id));
        if ($opc->num_rows() > 0) {
            $data['operatingcfCashflow'] = $opc->result_array();
        }
        $oc = $this->forecast->getForecast(array('type' => $this->typeArr['othercf'], 'cid' => $company_id));
        if ($oc->num_rows() > 0) {
            $data['othercfCashflow'] = $oc->result_array();
        }
        if ($type == 'pdf') {
            return $data;
        } else {
            return $this->load->view('forecast/cashflow_view', $data, true);
        }
    }

    public function _getDefaultArray($arr) {
        $assets = array();
        foreach ($arr as $title => $sign) {
            $assets[] = array(
                'name' => $title,
                'price' => '0',
                'fy1' => '0',
                'fy2' => '0',
                'fy3' => '0',
                'fy4' => '0',
                'fy5' => '0',
                'sign' => $sign
            );
        }
        return $assets;
    }

    public function pdf() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->load->library('Pdfdownload');
            $companyId = $this->session->userdata('companyid');
            $company_detail = $this->company->getcompany($companyId)->row();
            $company = $company_detail->name;
            $form['revenue'] = $this->forecast->gettotal($companyId, '12');
            $form['income'] = $this->forecast->getincome($companyId, '6');
            $form['costs'] = $this->forecast->gettotal($companyId, '13');
            $form['expense'] = $this->forecast->gettotal($companyId, '14');
            $forecast_length = $this->company->getcompany($companyId)->row();
            $form['f_length'] = $len = $forecast_length->forecast_length;
            $form['f_year'] = $len = $forecast_length->forecast_date;

            $planDetails = $this->_getPlanDetails($companyId);
            $cover_page = $this->plan->getPlanCover(array('companyid' => $companyId));
            $count = $cover_page->num_rows();
            if ($count != '0') {
                $result = $cover_page->row();
                $slogan = $result->slogan;
                $street = $result->street;
                $city = $result->city;
                $state = $result->state;
                $postal = $result->postal;
                $country = $result->country;
                $contact = $result->contact;
                $email = $result->email;
                $phone = $result->phone;
                $message = $result->message;
                $time = $result->created_on;
                $phpdate = strtotime($time);
                $created = date('M Y', $phpdate);
            } else {
                $slogan = 'Sample Slogan';
                $street = 'sample';
                $city = 'sample';
                $state = 'sample';
                $postal = '123456';
                $country = 'sample';
                $contact = 'sample';
                $email = 'sample@gmail.com';
                $phone = '1234567890';
                $message = 'Sample message';
                $created = 'Oct 2016';
            }
            $chtml = '<body style="background: transparent url(' . site_url() . 'assets/image/design4_transp_new.png)repeat top;margin:0 auto; padding:0px;width:100%;">
    <div style="height:1000px;">
<div style="width:100%;height:180px;"></div>
<div >
<div style="margin: 0 10%;text-align:center"><h1>Confidential</h1></div>
<div style="margin:2% 10%;color:#2EA194;font-size:43px;font-weight:bold;text-align:center"><span>' . $company . '</span></div>
<div style="margin:2% 10%;color:#666666;font-size:23px;text-align:center"><span>' . $slogan . '</span></div>
<div style="margin:10% 10% 3% 10%;color:#666666;font-size:23px;font-weight:100;text-align:center"><span>BUSINESS PLAN</span></div>
<div style="margin:5% 10% 3% 10%;color:#999999;font-size:23px;font-weight:bold;text-align:center"><span>PREPARED ' . $created . '</span></div>
<div style="width:100%;height:200px; "></div>
<div style="width:100%;height:200px; border-top:solid 1px #2EA194">
<h3 style="color:#999999">Contact Information</h3>
<table style="width:100%;">
<tbody>
<tr style="width:100%;">
                                                <td style=" color: #999; width:50%; float:left;padding:1% 0;">
                                                    <span style="font-size:16px;">' . $contact . '</span>
                                                </td>
                                                <td style=" color: #999; width:50%; float:left;padding:1% 0;">
                                                    <span style="font-size:16px;">' . $street . '</span>
                                                </td>
</tr>
<tr style="width:100%;">
<td style=" color: #999; width:50%; float:left;padding:1% 0;">
                                                    <span style="font-size:16px;">' . $phone . '</span>
                                                </td>
                                                <td style=" color: #999; width:50%; float:left;padding:1% 0;">
                                                    <span style="font-size:16px;">' . $city . '</span>
                                                </td>
                                                </tr>
<tr style="width:100%;"> 
<td style=" color: #999; width:50%; float:left;padding:1% 0;">
                                                    <span style="font-size:16px;">' . $email . '</span>
                                                </td>
                                                 <td style=" color: #999; width:50%; float:left;padding:1% 0;">
                                                    <span style="font-size:16px;">' . $state . '-' . $postal . '</span>
                                                </td>
                                                </tr>

                                            
</tbody>
</table>
</div>
</div>
</div>
<pagebreak />

</body>';

            $html = '<style>
p{
font-weight:normal;
font-family:freeserif;
font-size:15px;
}    
</style><body  style="background: transparent url(design4_transp_new.png)repeat top;margin:0 auto; padding:0px;width:100%;font-weight:normal;">
<div style="height:1000px;padding-bottom:3%;text-align:left;" >';
//        if (isset($planDetails[0])) {
            foreach ($planDetails[0] as $key => $title) {
                $html .= '<h1 style="color:#32BFAD;">' . $title->title . '</h1>';
                if (isset($planDetails[$key])) {
                    foreach ($planDetails[$key] as $sKey => $sTitle) {
                        $html .= '<h2>' . $sTitle->title . '</h2>';
                        if (isset($planDetails[$sKey])) {
                            foreach ($planDetails[$sKey] as $tKey => $tTitle) {
                                $title = $tTitle->title;
                                $summary = $tTitle->summary;
                                switch ($title) {
                                    case 'Milestones':
                                        $html .= $this->_milestone($title);
                                        break;
                                    case 'Revenue':
                                        $html .= $this->_revenue($title);
                                        break;
                                    case 'Expenses By Year':
                                        $html .= $this->_expense($title);
                                        $html .='<pagebreak />';
                                        break;
                                    case 'Net Profit and Loss':
                                        $html .= $this->_profit($title);
                                        $html .='<pagebreak />';
                                        break;
                                    case 'Setup Cost':
                                        $html .= '<h4>' . $tTitle->title . '</h4>';
                                        $html .= $this->_printSetupcost();
                                        $html .='<pagebreak />';
                                        break;
                                    case 'Income profit and loss':
                                        $html .= '<h4>' . $tTitle->title . '</h4>';
                                        $html .= $this->_printIncome();
                                        $html .='<pagebreak />';
                                        break;
                                    case 'Cashflow':
                                        $html .= '<h4>' . $tTitle->title . '</h4>';
                                        $html .= $this->_printCashflow();
                                        $html .='<pagebreak />';
                                        break;
                                    case 'Balance Sheet':
                                        $html .= '<h4>' . $tTitle->title . '</h4>';
                                        $html .= $this->_printBalanceSheet();
                                        break;
                                    default:
                                        if (!empty($summary)) {
                                            $html .= '<h4>' . $title . '</h4>';
                                            $html .= '<p>' . $summary . '</p>';
                                        }
                                        break;
                                }
                            }
                        }
                    }
                    $html .='<pagebreak />';
                }
            }
//        }

            $html .= '</div>
</body>';

//==============================================================
// Set Header and Footer
            $h = array(
                'odd' =>
                array(
                    'R' =>
                    array(
                        'content' => '{PAGENO}',
                        'font-size' => 8,
                        'font-style' => 'B',
                    ),
                    'L' =>
                    array(
                        'content' => "Bizjumper",
                        'font-size' => 8,
                        'font-style' => 'L',
                    ),
                ),
                'even' =>
                array(
                    'R' =>
                    array(
                        'content' => '{PAGENO}',
                        'font-size' => 8,
                        'font-style' => 'B',
                    ),
                    'L' =>
                    array(
                        'content' => "Bizjumper",
                        'font-size' => 8,
                        'font-style' => 'L',
                    ),
                ),
            );

            $f = array(
                'odd' =>
                array(
                    'L' =>
                    array(
                        'content' => $company,
                        'font-size' => 8,
                    ),
                    'R' =>
                    array(
                        'content' => '{PAGENO}',
                        'font-size' => 8,
                    ),
                    'line' => 1,
                ),
                'even' =>
                array(
                    'L' =>
                    array(
                        'content' => $company,
                        'font-size' => 8,
                    ),
                    'R' =>
                    array(
                        'content' => '{PAGENO}',
                        'font-size' => 8,
                    ),
                    'line' => 1,
                ),
            );


            $mpdf = new mPDF('', '', '12', 'arialunicodems');
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->WriteHTML($chtml);
//        $mpdf->setHeader($h);
            $mpdf->setFooter($f);
            $mpdf->WriteHTML($html);
            $mpdf->Output($company . '.pdf', 'D');
            exit;
        }
        $data['menu_type'] = 'plan';
        $data['sub_menu'] = 'download';
        $data['company_id'] = $this->session->userdata('company_id');
        echo $this->create_chart_view();
        $this->load->view('plan/download', $data);
    }

    public function create_chart_view() {
        $data['company_id'] = $company_id = $this->session->userdata('companyid');
        $data['revenue'] = $income = $this->forecast->gettotal($company_id, '12');
        $data['income'] = $this->forecast->getincome($company_id, '6');
        $data['costs'] = $this->forecast->gettotal($company_id, '13', 'expense');
        $data['pitch_details'] = $pitch = $this->b_pitch->get_alldetails($company_id);
        $data['f_length'] = $pitch[0]['forecast_length'];
        $data['f_date'] = $pitch[0]['forecast_date'];
        $data['currency'] = $pitch[0]['currency'];
        return $this->load->view('pitch/chart_image', $data, true);
    }

    private function _getPlanDetails($companyId) {
        $mainMenu = array();
        $allMenus = $this->plan->getPlanMenu(array('companyid' => $companyId, 'status' => 1), 'menuid')->result();
        foreach ($allMenus as $menu) {
            $mainMenu[$menu->parentid][$menu->menuid] = $menu;
        }
        return $mainMenu;
    }

    private function _milestone($title = NULL) {
        $companyId = $this->session->userdata('companyid');
        $data = $this->b_pitch->get_milestonedetail($companyId);
        $count = $data->num_rows();
        $value = $data->result();
        $html = '';
        if ($count > '0') {
            $html .= '<h4>' . $tTitle->title . '</h4>';
            $html .= '<table style="width:100%;">
                        <thead>
                        <tr style="background:#000000;">
                        <th style="color:#ffffff;text-align:center">Milestone</th>
                        <th style="color:#ffffff;text-align:center">Due Date</th>
                        <th style="color:#ffffff;text-align:center">Details</th>
                        </tr>
                        </thead>
                        <tbody>';
            $count = '0';
            foreach ($value as $val) {
                $color = ($count % 2 == 0) ? '#cccccc' : '#eeeeee';
                $html .='<tr style="background:' . $color . '">
                        <td style="padding:2%;font-size:12px !important;">' . $val->name . '</td>
                        <td style="padding:2%;font-size:12px !important;">' . $val->date . '</td>
                            <td style="padding:2%;font-size:12px !important;">' . $val->description . '</td>
                        </tr>';
                $count++;
            }
            $html .='</tbody></table>';
        } else {
            $html .='';
        }
        return $html;
    }

    private function _revenue($title) {
        $companyId = $this->session->userdata('companyid');
        $inputPath = base_url() . 'assets/image/forecast/revenue_' . $companyId . '.png';
        $html = '';
        if (!empty($title) && file_exists('assets/image/forecast/revenue_' . $companyId . '.png')) {
            $html .= '<h4>' . $title . '</h4>';
            $html .= '<img src="' . $inputPath . '" style="margin-left:25%;height:300px;width:400px;"/>';
        } else {
            $html .= '';
        }
        return $html;
    }

    private function _expense($title) {
        $companyId = $this->session->userdata('companyid');
        $inputPath = base_url() . 'assets/image/forecast/cost_' . $companyId . '.png';
        $html = '';
        if (!empty($title) && file_exists('assets/image/forecast/cost_' . $companyId . '.png')) {
            $html .= '<h4>' . $title . '</h4>';
            $html .= '<img src="' . $inputPath . '" style="margin-left:25%;height:300px;width:400px;"/>';
        } else {
            $html .= '';
        }
        return $html;
    }

    private function _profit($title) {
        $companyId = $this->session->userdata('companyid');
        $inputPath = base_url() . 'assets/image/forecast/profit_' . $companyId . '.png';
        $html = '';
        if (!empty($title) && file_exists('assets/image/forecast/profit_' . $companyId . '.png')) {
            $html .= '<h4>' . $title . '</h4>';
            $html .= '<img src="' . $inputPath . '" style="margin-left:25%;height:300px;width:400px;"/>';
        } else {
            $html .= '';
        }
        return $html;
    }

    private function _printbalancesheet() {
        $data = $this->_getBalanceSheet('pdf');
        return $this->load->view('templete/balancesheet', $data, TRUE);
    }

    private function _printSetupcost() {
        $data = $this->_getSetupcost('pdf');
        return $this->load->view('templete/setupcost', $data, TRUE);
    }

    private function _printIncome() {
        $data = $this->_getIncome('pdf');
        return $this->load->view('templete/income', $data, TRUE);
    }

    private function _printCashflow() {
        $data = $this->_getCashflow('pdf');
        return $this->load->view('templete/cashflow', $data, TRUE);
    }

}
