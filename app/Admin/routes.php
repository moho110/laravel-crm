<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    //路由定义
    $router->get('oa/cmf_accessbank', 'CmfAccessbankController@index');
    $router->get('oa/cmf_accessprepay', 'CmfAccessprepayController@index');
    $router->get('oa/cmf_accesspreshou', 'CmfAccesspreshouController@index');
    $router->get('oa/cmf_accesstype', 'CmfAccesstypeController@index');
    $router->get('oa/cmf_affair', 'CmfAffairController@index');
    $router->get('oa/cmf_bank', 'CmfBankController@index');
    $router->get('oa/cmf_crm_mytable', 'CmfCrmMytableController@index');
    $router->get('oa/cmf_calendars','CmfCalendarController@index');
    $router->get('oa/cmf_bankzhuru', 'CmfBankzhuruController@index');
    $router->get('oa/cmf_buyplanmain', 'CmfBuyplanmainController@index');
    $router->get('oa/cmf_buyplanmain_detail_color', 'CmfBuyplanmainDetailColorController@index');
    $router->get('oa/cmf_buyplanmain_detail', 'CmfBuyplanmainDetailController@index');
    $router->get('oa/cmf_buyplanmain_mingxi', 'CmfBuyplanmainMingxiController@index');
    $router->get('oa/cmf_buyplanmain_tmp_color', 'CmfBuyplanmainTmpColorController@index');
    $router->get('oa/cmf_buyplanstate', 'CmfBuyplanstateController@index');
    $router->get('oa/cmf_calendar_type', 'CmfCalendarTypeController@index');
    $router->get('oa/cmf_callchuli', 'CmfCallchuliController@index');
    $router->get('oa/cmf_callertype', 'CmfCallertypeController@index');
    $router->get('oa/cmf_calltype', 'CmfCalltypeController@index');
    $router->get('oa/cmf_certificate', 'CmfCertificateController@index');
    $router->get('oa/cmf_certificatetype', 'CmfCertificatetypeController@index');
    $router->get('oa/cmf_cmdict_countrycode', 'CmfCmdictCountrycodeController@index');
    $router->get('oa/cmf_cmdict_danyuanyongtu', 'CmfCmdictDanyuanyongtuController@index');
    $router->get('oa/cmf_comment', 'CmfCommentController@index');
    $router->get('oa/cmf_commlog', 'CmfCommlogController@index');
    $router->get('oa/cmf_competeproduct', 'CmfCompeteproductController@index');
    $router->get('oa/cmf_contract_flag', 'CmfContractFlagController@index');
    $router->get('oa/cmf_crm_chance', 'CmfCrmChanceController@index');
    $router->get('oa/cmf_crm_chance_rate', 'CmfCrmChanceRateController@index');
    $router->get('oa/cmf_crm_contact', 'CmfCrmContactController@index');
    $router->get('oa/cmf_crm_customer_move', 'CmfCrmCustomerMoveController@index');
    $router->get('oa/cmf_crm_dict_servicesources', 'CmfCrmDictServicesourcesController@index');
    $router->get('oa/cmf_crm_dict_servicestatus', 'CmfCrmDictServicestatusController@index');
    $router->get('oa/cmf_crm_dict_servicetypes', 'CmfCrmDictServicetypesController@index');
    $router->get('oa/cmf_crm_feiyong_sq', 'CmfCrmFeiyongSqController@index');
    $router->get('oa/cmf_crm_finishstate', 'CmfCrmFinishstateController@index');
    $router->get('oa/cmf_crm_jieduan', 'CmfCrmJieduanController@index');
    $router->get('oa/cmf_crm_mytable_notes', 'CmfCrmMytableNotesController@index');
    $router->get('oa/cmf_crm_mytable_wz', 'CmfCrmMytableWzController@index');
    $router->get('oa/cmf_crm_mytable_xssx', 'CmfCrmMytableXssxController@index');
    $router->get('oa/cmf_crm_piaoju_type', 'CmfCrmPiaojuTypeController@index');
    $router->get('oa/cmf_crm_remember', 'CmfCrmRememberController@index');
    $router->get('oa/cmf_crm_service', 'CmfCrmServiceController@index');
    $router->get('oa/cmf_crm_shenhezhuangtai', 'CmfCrmShenhezhuangtaiController@index');
    $router->get('oa/cmf_crm_shenqingbaobei', 'CmfCrmShenqingbaobeiController@index');
    $router->get('oa/cmf_crm_zhuangtai', 'CmfCrmZhuangtaiController@index');
    $router->get('oa/cmf_customerarea', 'CmfCustomerareaController@index');
    $router->get('oa/cmf_customerbelong', 'CmfCustomerbelongController@index');
    $router->get('oa/cmf_customer', 'CmfCustomerController@index');
    $router->get('oa/cmf_customerdefinetype', 'CmfCustomerdefinetypeController@index');
    $router->get('oa/cmf_customer_fangan', 'CmfCustomerFanganController@index');
    $router->get('oa/cmf_customerlever', 'CmfCustomerleverController@index');
    $router->get('oa/cmf_customerorigin', 'CmfCustomeroriginController@index');
    $router->get('oa/cmf_customerproduct', 'CmfCustomerproductController@index');
    $router->get('oa/cmf_customerproduct_detail', 'CmfCustomerproductDetailController@index');
    $router->get('oa/cmf_customer_xuqiu', 'CmfCustomerXuqiuController@index');
    $router->get('oa/cmf_department', 'CmfDepartmentController@index');
    $router->get('oa/cmf_dict_danyuanyongtu', 'CmfDictDanyuanyongtuController@index');
    $router->get('oa/cmf_dict_danyuanzhuangtai', 'CmfDictDanyuanzhuangtaiController@index');
    $router->get('oa/cmf_dict_education', 'CmfDictEducationController@index');
    $router->get('oa/cmf_dict_huxing', 'CmfDictHuxingController@index');
    $router->get('oa/cmf_dict_notify', 'CmfDictNotifyController@index');
    $router->get('oa/cmf_dict_satisfaction', 'CmfDictSatisfactionController@index');
    $router->get('oa/cmf_dict_shiyongleixing', 'CmfDictShiyongleixingController@index');
    $router->get('oa/cmf_dict_weekday', 'CmfDictWeekdayController@index');
    $router->get('oa/cmf_dict_xingbie', 'CmfDictXingbieController@index');
    $router->get('oa/cmf_dict_xingzheng_qingjia', 'CmfDictXingzhengQingjiaController@index');
    $router->get('oa/cmf_dict_zhengjianleixing', 'CmfDictZhengjianleixingController@index');
    $router->get('oa/cmf_dorm_area', 'CmfDormAreaController@index');
    $router->get('oa/cmf_dorm_building', 'CmfDormBuildingController@index');
    $router->get('oa/cmf_edu_boolean', 'CmfEduBooleanController@index');
    $router->get('oa/cmf_edu_building', 'CmfEduBuildingController@index');
    $router->get('oa/cmf_edu_schoolcalendar', 'CmfEduSchoolcalendarController@index');
    $router->get('oa/cmf_edu_teacherkaoqin', 'CmfEduTeacherkaoqinController@index');
    $router->get('oa/cmf_edu_xingzheng_banci', 'CmfEduXingzhengBanciController@index');
    $router->get('oa/cmf_edu_xingzheng_group', 'CmfEduXingzhengGroupController@index');
    $router->get('oa/cmf_edu_xingzheng_jiabanbuxiu', 'CmfEduXingzhengJiabanbuxiuController@index');
    $router->get('oa/cmf_edu_xingzheng_kaoqinbudeng', 'CmfEduXingzhengKaoqinbudengController@index');
    $router->get('oa/cmf_edu_xingzheng_kaoqinmingxi', 'CmfEduXingzhengKaoqinmingxiController@index');
    $router->get('oa/cmf_edu_xingzheng_paiban', 'CmfEduXingzhengPaibanController@index');
    $router->get('oa/cmf_edu_xingzheng_qingjia', 'CmfEduXingzhengQingjiaController@index');
    $router->get('oa/cmf_edu_xingzheng_tiaoban', 'CmfEduXingzhengTiaobanController@index');
    $router->get('oa/cmf_edu_xingzheng_tiaobanxianghu', 'CmfEduXingzhengTiaobanxianghuController@index');
    $router->get('oa/cmf_edu_xingzheng_tiaoxiububan', 'CmfEduXingzhengTiaoxiububanController@index');
    $router->get('oa/cmf_edu_xingzheng_work_check_register', 'CmfEduXingzhengWorkCheckRegisterController@index');
    $router->get('oa/cmf_edu_xingzheng_yearcheck', 'CmfEduXingzhengYearcheckController@index');
    $router->get('oa/cmf_edu_xueqiexec', 'CmfEduXueqiexecController@index');
    $router->get('oa/cmf_edu_zhongcengceping', 'CmfEduZhongcengcepingController@index');
    $router->get('oa/cmf_edu_zhongcengmingxi', 'CmfEduZhongcengmingxiController@index');
    $router->get('oa/cmf_edu_zhongcengrenyuan', 'CmfEduZhongcengrenyuanController@index');
    $router->get('oa/cmf_edu_zhongcengxingmu', 'CmfEduZhongcengxingmuController@index');
    $router->get('oa/cmf_email', 'CmfEmailController@index');
    $router->get('oa/cmf_emailstate', 'CmfEmailstateController@index');
    $router->get('oa/cmf_exchange', 'CmfExchangeController@index');
    $router->get('oa/cmf_fahuodan', 'CmfFahuodanController@index');
    $router->get('oa/cmf_fahuodan_detail', 'CmfFahuodanDetailController@index');
    $router->get('oa/cmf_fahuostate', 'CmfFahuostateController@index');
    $router->get('oa/cmf_fahuotype', 'CmfFahuotypeController@index');
    $router->get('oa/cmf_feiyongclass', 'CmfFeiyongclassController@index');
    $router->get('oa/cmf_feiyongrecord', 'CmfFeiyongrecordController@index');
    $router->get('oa/cmf_feiyongtype', 'CmfFeiyongtypeController@index');
    $router->get('oa/cmf_fixedassetbaofei', 'CmfFixedassetbaofeiController@index');
    $router->get('oa/cmf_fixedasset', 'CmfFixedassetController@index');
    $router->get('oa/cmf_fixedassetgroup', 'CmfFixedassetgroupController@index');
    $router->get('oa/cmf_fixedassetin', 'CmfFixedassetinController@index');
    $router->get('oa/cmf_fixedassetleibie', 'CmfFixedassetleibieController@index');
    $router->get('oa/cmf_fixedassetout', 'CmfFixedassetoutController@index');
    $router->get('oa/cmf_fixedassetstatus', 'CmfFixedassetstatusController@index');
    $router->get('oa/cmf_fixedassettiaoku', 'CmfFixedassettiaokuController@index');
    $router->get('oa/cmf_fixedassettui', 'CmfFixedassettuiController@index');
    $router->get('oa/cmf_fixedassetweixiu', 'CmfFixedassetweixiuController@index');
    $router->get('oa/cmf_fukuanplan', 'CmfFukuanplanController@index');
    $router->get('oa/cmf_fukuanrecord', 'CmfFukuanrecordController@index');
    $router->get('oa/cmf_gb_marriage', 'CmfGbMarriageController@index');
    $router->get('oa/cmf_gb_national', 'CmfGbNationalController@index');
    $router->get('oa/cmf_gb_political', 'CmfGbPoliticalController@index');
    $router->get('oa/cmf_gb_sex', 'CmfGbSexController@index');
    $router->get('oa/cmf_hrms_boolean', 'CmfHrmsBooleanController@index');
    $router->get('oa/cmf_hrms_educationalexperience', 'CmfHrmsEducationalexperienceController@index');
    $router->get('oa/cmf_hrms_expense', 'CmfHrmsExpenseController@index');
    $router->get('oa/cmf_hrms_expense_type', 'CmfHrmsExpenseTypeController@index');
    $router->get('oa/cmf_hrms_file', 'CmfHrmsFileController@index');
    $router->get('oa/cmf_hrms_file_fuzhi', 'CmfHrmsFileFuzhiController@index');
    $router->get('oa/cmf_hrms_file_lizhi', 'CmfHrmsFileLizhiController@index');
    $router->get('oa/cmf_hrms_file_luyong', 'CmfHrmsFileLuyongController@index');
    $router->get('oa/cmf_hrms_laboringskill', 'CmfHrmsLaboringskillController@index');
    $router->get('oa/cmf_hrms_reward_punishment', 'CmfHrmsRewardPunishmentController@index');
    $router->get('oa/cmf_hrms_r_p', 'CmfHrmsRPController@index');
    $router->get('oa/cmf_hrms_r_p_name', 'CmfHrmsRPNameController@index');
    $router->get('oa/cmf_hrms_r_p_status', 'CmfHrmsRPStatusController@index');
    $router->get('oa/cmf_hrms_socialrelation', 'CmfHrmsSocialrelationController@index');
    $router->get('oa/cmf_hrms_transfer', 'CmfHrmsTransferController@index');
    $router->get('oa/cmf_hrms_transfer_type', 'CmfHrmsTransferTypeController@index');
    $router->get('oa/cmf_hrms_worker_hetong', 'CmfHrmsWorkerHetongController@index');
    $router->get('oa/cmf_hrms_worker_zhengzhao', 'CmfHrmsWorkerZhengzhaoController@index');
    $router->get('oa/cmf_hrms_worker_zhicheng', 'CmfHrmsWorkerZhichengController@index');
    $router->get('oa/cmf_hrms_workexperience', 'CmfHrmsWorkexperienceController@index');
    $router->get('oa/cmf_hrms_work_status', 'CmfHrmsWorkStatusController@index');
    $router->get('oa/cmf_hrms_zhiwei_status', 'CmfHrmsZhiweiStatusController@index');
    $router->get('oa/cmf_hrms_zpjihua', 'CmfHrmsZpjihuaController@index');
    $router->get('oa/cmf_hrms_zprencaiku', 'CmfHrmsZprencaikuController@index');
    $router->get('oa/cmf_huikuanplan', 'CmfHuikuanplanController@index');
    $router->get('oa/cmf_huikuanrecord', 'CmfHuikuanrecordController@index');
    $router->get('oa/cmf_ifneed', 'CmfIfneedController@index');
    $router->get('oa/cmf_important', 'CmfImportantController@index');
    $router->get('oa/cmf_inorout', 'CmfInoroutController@index');
    $router->get('oa/cmf_kaipiaorecord', 'CmfKaipiaorecordController@index');
    $router->get('oa/cmf_kaipiaostate', 'CmfKaipiaostateController@index');
    $router->get('oa/cmf_linkman', 'CmfLinkmanController@index');
    $router->get('oa/cmf_measure', 'CmfMeasureController@index');
    $router->get('oa/cmf_message', 'CmfMessageController@index');
    $router->get('oa/cmf_modifyrecord', 'CmfModifyrecordController@index');
    $router->get('oa/cmf_notify', 'CmfNotifyController@index');
    $router->get('oa/cmf_numzero', 'CmfNumzeroController@index');
    $router->get('oa/cmf_officeguihuanstate', 'CmfOfficeguihuanstateController@index');
    $router->get('oa/cmf_officeproductbaofei', 'CmfOfficeproductbaofeiController@index');
    $router->get('oa/cmf_officeproduct', 'CmfOfficeproductController@index');
    $router->get('oa/cmf_officeproductgroup', 'CmfOfficeproductgroupController@index');
    $router->get('oa/cmf_officeproductin', 'CmfOfficeproductinController@index');
    $router->get('oa/cmf_officeproductleibie', 'CmfOfficeproductleibieController@index');
    $router->get('oa/cmf_officeproductout', 'CmfOfficeproductoutController@index');
    $router->get('oa/cmf_officeproducttiaoku', 'CmfOfficeproducttiaokuController@index');
    $router->get('oa/cmf_officeproducttui', 'CmfOfficeproducttuiController@index');
    $router->get('oa/cmf_office_task', 'CmfOfficeTaskController@index');
    $router->get('oa/cmf_paystate', 'CmfPaystateController@index');
    $router->get('oa/cmf_productcolor', 'CmfProductcolorController@index');
    $router->get('oa/cmf_product', 'CmfProductController@index');
    $router->get('oa/cmf_producttype', 'CmfProducttypeController@index');
    $router->get('oa/cmf_productzuzhuang2_detail', 'CmfProductzuzhuang2DetailController@index');
    $router->get('oa/cmf_productzuzhuang', 'CmfProductzuzhuangController@index');
    $router->get('oa/cmf_productzuzhuang_detail', 'CmfProductzuzhuangDetailController@index');
    $router->get('oa/cmf_productzuzhuangstate', 'CmfProductzuzhuangstateController@index');
    $router->get('oa/cmf_property', 'CmfPropertyController@index');
    $router->get('oa/cmf_recycle_bin', 'CmfRecycleBinController@index');
    $router->get('oa/cmf_salemode', 'CmfSalemodeController@index');
    $router->get('oa/cmf_sellbilltype', 'CmfSellbilltypeController@index');
    $router->get('oa/cmf_sellcontract_jiaofu', 'CmfSellcontractJiaofuController@index');
    $router->get('oa/cmf_sellplanmain', 'CmfSellplanmainController@index');
    $router->get('oa/cmf_sellplanmain_detail_color', 'CmfSellplanmainDetailColorController@index');
    $router->get('oa/cmf_sellplanmain_detail', 'CmfSellplanmainDetailController@index');
    $router->get('oa/cmf_sellplanstate', 'CmfSellplanstateController@index');
    $router->get('oa/cmf_shoupiaorecord', 'CmfShoupiaorecordController@index');
    $router->get('oa/cmf_sms_sendlist', 'CmfSmsSendlistController@index');
    $router->get('oa/cmf_stockchangemain', 'CmfStockchangemainController@index');
    $router->get('oa/cmf_stockchangemain_detail', 'CmfStockchangemainDetailController@index');
    $router->get('oa/cmf_stockchangestate', 'CmfStockchangestateController@index');
    $router->get('oa/cmf_stock', 'CmfStockController@index');
    $router->get('oa/cmf_stockinmain', 'CmfStockinmainController@index');
    $router->get('oa/cmf_stockinmain_detail_color', 'CmfStockinmainDetailColorController@index');
    $router->get('oa/cmf_stockinmain_detail', 'CmfStockinmainDetailController@index');
    $router->get('oa/cmf_stockoutmain', 'CmfStockoutmainController@index');
    $router->get('oa/cmf_stockoutmain_detail_color', 'CmfStockoutmainDetailColorController@index');
    $router->get('oa/cmf_stockoutmain_detail', 'CmfStockoutmainDetailController@index');
    $router->get('oa/cmf_storeaccesstype', 'CmfStoreaccesstypeController@index');
    $router->get('oa/cmf_storecheck', 'CmfStorecheckController@index');
    $router->get('oa/cmf_storecheck_detail', 'CmfStorecheckDetailController@index');
    $router->get('oa/cmf_store_color', 'CmfStoreColorController@index');
    $router->get('oa/cmf_store', 'CmfStoreController@index');
    $router->get('oa/cmf_store_init', 'CmfStoreInitController@index');
    $router->get('oa/cmf_supply', 'CmfSupplyController@index');
    $router->get('oa/cmf_supplylever', 'CmfSupplyleverController@index');
    $router->get('oa/cmf_supplylinkman', 'CmfSupplylinkmanController@index');
    $router->get('oa/cmf_supplyproduct', 'CmfSupplyproductController@index');
    $router->get('oa/cmf_sys_code', 'CmfSysCodeController@index');
    $router->get('oa/cmf_sys_function', 'CmfSysFunctionController@index');
    $router->get('oa/cmf_sys_menu', 'CmfSysMenuController@index');
    $router->get('oa/cmf_systemconfig', 'CmfSystemconfigController@index');
    $router->get('oa/cmf_systemhelp', 'CmfSystemhelpController@index');
    $router->get('oa/cmf_systemlang', 'CmfSystemlangController@index');
    $router->get('oa/cmf_system_logall', 'CmfSystemLogallController@index');
    $router->get('oa/cmf_system_log', 'CmfSystemLogController@index');
    $router->get('oa/cmf_system_logtype', 'CmfSystemLogtypeController@index');
    $router->get('oa/cmf_systemprivateconfig', 'CmfSystemprivateconfigController@index');
    $router->get('oa/cmf_systemprivate', 'CmfSystemprivateController@index');
    $router->get('oa/cmf_systemprivateinc', 'CmfSystemprivateincController@index');
    $router->get('oa/cmf_systemtable', 'CmfSystemtableController@index');
    $router->get('oa/cmf_unit', 'CmfUnitController@index');
    $router->get('oa/cmf_unitprop', 'CmfUnitpropController@index');
    $router->get('oa/cmf_workplanmain', 'CmfWorkplanmainController@index');
    $router->get('oa/cmf_workplanmain_detail', 'CmfWorkplanmainDetailController@index');
    $router->get('oa/cmf_workplanshenhe', 'CmfWorkplanshenheController@index');
    $router->get('oa/cmf_workplanstate', 'CmfWorkplanstateController@index');
    $router->get('oa/cmf_workreport', 'CmfWorkreportController@index');
    $router->get('oa/cmf_wu_boolean', 'CmfWuBooleanController@index');
    $router->get('oa/cmf_wu_buildinginformation', 'CmfWuBuildinginformationController@index');

    //统计分析
    $router->get('oa/cmf_supplyownmoney', 'CmfSupplyownmoneyController@index');
    $router->get('oa/CmfYingshoukuanhuizong', 'CmfYingshoukuanhuizongController@index');
    $router->get('oa/CmfXiaoshoubaobiao', 'CmfXiaoshoubaobiaoController@index');
    $router->get('oa/CmfCustomsRankingList', 'CmfCustomsRankingListController@index');
    $router->get('oa/CmfSalsemanRankingList', 'CmfSalsemanRankingListController@index');
    $router->get('oa/CmfChanpinxiaoshouhuizong', 'CmfChanpinxiaoshouhuizongController@index');
    $router->get('oa/CmfKehuxinzengzoushi', 'CmfKehuxinzengzoushiController@index');
    $router->get('oa/CmfGongyingshanggonghuohuizong', 'CmfGongyingshanggonghuohuizongController@index');
    $router->get('oa/CmfChanpincaigouhuizong', 'CmfChanpincaigouhuizongController@index');
    $router->get('oa/CmfCaigouyuanhuizong', 'CmfCaigouyuanhuizongController@index');
    $router->get('oa/CmfDiquduibi', 'CmfDiquduibiController@index');
    $router->get('oa/CmfBumenduibi', 'CmfBumenduibiController@index');
    $router->get('oa/CmfYueduxiaoshouzoushi', 'CmfYueduxiaoshouzoushiController@index');
    $router->get('oa/CmfYuedukaizhizoushi', 'CmfYuedukaizhizoushiController@index');
    $router->get('oa/CmfTuihuohuizong', 'CmfTuihuohuizongController@index');
    $router->get('oa/CmfChanpinliudong', 'CmfChanpinliudongController@index');
    $router->get('oa/CmfMaolihuizong', 'CmfMaolihuizongController@index');
    $router->get('oa/CmfXiaoshouloudou', 'CmfXiaoshouloudouController@index');
    $router->get('oa/CmfYuedulirunzoushi', 'CmfYuedulirunzoushiController@index');
    $router->get('oa/CmfKucunbaojing', 'CmfKucunbaojingController@index');
    $router->get('oa/CmfYingkaipiaohuizong', 'CmfYingkaipiaohuizongController@index');
    
    //定义资源
    $router->resource('oa/cmf_crm_mytable',CmfCrmMytableController::class);
    $router->resource('oa/cmf_calendars',CmfCalendarController::class);
    $router->resource('oa/cmf_accessbank',CmfAccessbankController::class);
    $router->resource('oa/cmf_accessprepay',CmfAccessprepayController::class);
    $router->resource('oa/cmf_accesspreshou',CmfAccesspreshouController::class);
    $router->resource('oa/cmf_accesstype',CmfAccesstypeController::class);
    $router->resource('oa/cmf_affair',CmfAffairController::class);
    $router->resource('oa/cmf_bank',CmfBankController::class);
    $router->resource('oa/cmf_bankzhuru',CmfBankzhuruController::class);
    $router->resource('oa/cmf_buyplanmain',CmfBuyplanmainController::class);
    $router->resource('oa/cmf_buyplanmain_detail_color',CmfBuyplanmainDetailColorController::class);
    $router->resource('oa/cmf_buyplanmain_detail',CmfBuyplanmainDetailController::class);
    $router->resource('oa/cmf_buyplanmain_mingxi',CmfBuyplanmainMingxiController::class);
    $router->resource('oa/cmf_buyplanmain_tmp_color',CmfBuyplanmainTmpColorController::class);
    $router->resource('oa/cmf_buyplanstate',CmfBuyplanstateController::class);
    $router->resource('oa/cmf_calendar_type',CmfCalendarTypeController::class);
    $router->resource('oa/cmf_callchuli',CmfCallchuliController::class);
    $router->resource('oa/cmf_callertype',CmfCallertypeController::class);
    $router->resource('oa/cmf_calltype',CmfCalltypeController::class);
    $router->resource('oa/cmf_certificate',CmfCertificateController::class);
    $router->resource('oa/cmf_certificatetype',CmfCertificatetypeController::class);
    $router->resource('oa/cmf_cmdict_countrycode',CmfCmdictCountrycodeController::class);
    $router->resource('oa/cmf_cmdict_danyuanyongtu',CmfCmdictDanyuanyongtuController::class);
    $router->resource('oa/cmf_comment',CmfCommentController::class);
    $router->resource('oa/cmf_commlog',CmfCommlogController::class);
    $router->resource('oa/cmf_competeproduct',CmfCompeteproductController::class);
    $router->resource('oa/cmf_contract_flag',CmfContractFlagController::class);
    $router->resource('oa/cmf_crm_chance',CmfCrmChanceController::class);
    $router->resource('oa/cmf_crm_chance_rate',CmfCrmChanceRateController::class);
    $router->resource('oa/cmf_crm_contact',CmfCrmContactController::class);
    $router->resource('oa/cmf_crm_customer_move',CmfCrmCustomerMoveController::class);
    $router->resource('oa/cmf_crm_dict_servicesources',CmfCrmDictServicesourcesController::class);
    $router->resource('oa/cmf_crm_dict_servicestatus',CmfCrmDictServicestatusController::class);
    $router->resource('oa/cmf_crm_dict_servicetypes',CmfCrmDictServicetypesController::class);
    $router->resource('oa/cmf_crm_feiyong_sq',CmfCrmFeiyongSqController::class);
    $router->resource('oa/cmf_crm_finishstate',CmfCrmFinishstateController::class);
    $router->resource('oa/cmf_crm_jieduan',CmfCrmJieduanController::class);
    $router->resource('oa/cmf_crm_mytable_notes',CmfCrmMytableNotesController::class);
    $router->resource('oa/cmf_crm_mytable_wz',CmfCrmMytableWzController::class);
    $router->resource('oa/cmf_crm_mytable_xssx',CmfCrmMytableXssxController::class);
    $router->resource('oa/cmf_crm_piaoju_type',CmfCrmPiaojuTypeController::class);
    $router->resource('oa/cmf_crm_remember',CmfCrmRememberController::class);
    $router->resource('oa/cmf_crm_service',CmfCrmServiceController::class);
    $router->resource('oa/cmf_crm_shenhezhuangtai',CmfCrmShenhezhuangtaiController::class);
    $router->resource('oa/cmf_crm_shenqingbaobei',CmfCrmShenqingbaobeiController::class);
    $router->resource('oa/cmf_crm_zhuangtai',CmfCrmZhuangtaiController::class);
    $router->resource('oa/cmf_customerarea',CmfCustomerareaController::class);
    $router->resource('oa/cmf_customerbelong',CmfCustomerbelongController::class);
    $router->resource('oa/cmf_customer',CmfCustomerController::class);
    $router->resource('oa/cmf_customerdefinetype',CmfCustomerdefinetypeController::class);
    $router->resource('oa/cmf_customer_fangan',CmfCustomerFanganController::class);
    $router->resource('oa/cmf_customerlever',CmfCustomerleverController::class);
    $router->resource('oa/cmf_customerorigin',CmfCustomeroriginController::class);
    $router->resource('oa/cmf_customerproduct',CmfCustomerproductController::class);
    $router->resource('oa/cmf_customerproduct_detail',CmfCustomerproductDetailController::class);
    $router->resource('oa/cmf_customer_xuqiu',CmfCustomerXuqiuController::class);
    $router->resource('oa/cmf_department',CmfDepartmentController::class);
    $router->resource('oa/cmf_dict_danyuanyongtu',CmfDictDanyuanyongtuController::class);
    $router->resource('oa/cmf_dict_danyuanzhuangtai',CmfDictDanyuanzhuangtaiController::class);
    $router->resource('oa/cmf_dict_education',CmfDictEducationController::class);
    $router->resource('oa/cmf_dict_huxing',CmfDictHuxingController::class);
    $router->resource('oa/cmf_dict_notify',CmfDictNotifyController::class);
    $router->resource('oa/cmf_dict_satisfaction',CmfDictSatisfactionController::class);
    $router->resource('oa/cmf_dict_shiyongleixing',CmfDictShiyongleixingController::class);
    $router->resource('oa/cmf_dict_weekday',CmfDictWeekdayController::class);
    $router->resource('oa/cmf_dict_xingbie',CmfDictXingbieController::class);
    $router->resource('oa/cmf_dict_xingzheng_qingjia',CmfDictXingzhengQingjiaController::class);
    $router->resource('oa/cmf_dict_zhengjianleixing',CmfDictZhengjianleixingController::class);
    $router->resource('oa/cmf_dorm_area',CmfDormAreaController::class);
    $router->resource('oa/cmf_dorm_building',CmfDormBuildingController::class);
    $router->resource('oa/cmf_edu_boolean',CmfEduBooleanController::class);
    $router->resource('oa/cmf_edu_building',CmfEduBuildingController::class);
    $router->resource('oa/cmf_edu_schoolcalendar',CmfEduSchoolcalendarController::class);
    $router->resource('oa/cmf_edu_teacherkaoqin',CmfEduTeacherkaoqinController::class);
    $router->resource('oa/cmf_edu_xingzheng_banci',CmfEduXingzhengBanciController::class);
    $router->resource('oa/cmf_edu_xingzheng_group',CmfEduXingzhengGroupController::class);
    $router->resource('oa/cmf_edu_xingzheng_jiabanbuxiu',CmfEduXingzhengJiabanbuxiuController::class);
    $router->resource('oa/cmf_edu_xingzheng_kaoqinbudeng',CmfEduXingzhengKaoqinbudengController::class);
    $router->resource('oa/cmf_edu_xingzheng_kaoqinmingxi',CmfEduXingzhengKaoqinmingxiController::class);
    $router->resource('oa/cmf_edu_xingzheng_paiban',CmfEduXingzhengPaibanController::class);
    $router->resource('oa/cmf_edu_xingzheng_qingjia',CmfEduXingzhengQingjiaController::class);
    $router->resource('oa/cmf_edu_xingzheng_tiaoban',CmfEduXingzhengTiaobanController::class);
    $router->resource('oa/cmf_edu_xingzheng_tiaobanxianghu',CmfEduXingzhengTiaobanxianghuController::class);
    $router->resource('oa/cmf_edu_xingzheng_tiaoxiububan',CmfEduXingzhengTiaoxiububanController::class);
    $router->resource('oa/cmf_edu_xingzheng',CmfEduXingzhengWorkCheckRegisterController::class);
    $router->resource('oa/cmf_edu_xingzheng_yearcheck',CmfEduXingzhengYearcheckController::class);
    $router->resource('oa/cmf_edu_xueqiexec',CmfEduXueqiexecController::class);
    $router->resource('oa/cmf_edu_zhongcengceping',CmfEduZhongcengcepingController::class);
    $router->resource('oa/cmf_edu_zhongcengmingxi',CmfEduZhongcengmingxiController::class);
    $router->resource('oa/cmf_edu_zhongcengrenyuan',CmfEduZhongcengrenyuanController::class);
    $router->resource('oa/cmf_edu_zhongcengxingmu',CmfEduZhongcengxingmuController::class);
    $router->resource('oa/cmf_email',CmfEmailController::class);
    $router->resource('oa/cmf_emailstate',CmfEmailstateController::class);
    $router->resource('oa/cmf_exchange',CmfExchangeController::class);
    $router->resource('oa/cmf_fahuodan',CmfFahuodanController::class); //发货单
    $router->resource('oa/cmf_fahuodan_detail',CmfFahuodanDetailController::class);
    $router->resource('oa/cmf_fahuostate',CmfFahuostateController::class);
    $router->resource('oa/cmf_fahuotype',CmfFahuotypeController::class);
    $router->resource('oa/cmf_feiyongclass',CmfFeiyongclassController::class);
    $router->resource('oa/cmf_feiyongrecord',CmfFeiyongrecordController::class);
    $router->resource('oa/cmf_feiyongtype',CmfFeiyongtypeController::class);
    $router->resource('oa/cmf_fixedassetbaofei',CmfFixedassetbaofeiController::class);
    $router->resource('oa/cmf_fixedasset',CmfFixedassetController::class);
    $router->resource('oa/cmf_fixedassetgroup',CmfFixedassetgroupController::class);
    $router->resource('oa/cmf_fixedassetin',CmfFixedassetinController::class);
    $router->resource('oa/cmf_fixedassetleibie',CmfFixedassetleibieController::class);
    $router->resource('oa/cmf_fixedassetout',CmfFixedassetoutController::class);
    $router->resource('oa/cmf_fixedassetstatus',CmfFixedassetstatusController::class);
    $router->resource('oa/cmf_fixedassettiaoku',CmfFixedassettiaokuController::class);
    $router->resource('oa/cmf_fixedassettui',CmfFixedassettuiController::class);
    $router->resource('oa/cmf_fixedassetweixiu',CmfFixedassetweixiuController::class);
    $router->resource('oa/cmf_fukuanplan',CmfFukuanplanController::class);
    $router->resource('oa/cmf_fukuanrecord',CmfFukuanrecordController::class);
    $router->resource('oa/cmf_gb_marriage',CmfGbMarriageController::class);
    $router->resource('oa/cmf_gb_national',CmfGbNationalController::class);
    $router->resource('oa/cmf_gb_political',CmfGbPoliticalController::class);
    $router->resource('oa/cmf_gb_sex',CmfGbSexController::class);
    $router->resource('oa/cmf_hrms_boolean',CmfHrmsBooleanController::class);
    $router->resource('oa/cmf_hrms_educationalexperience',CmfHrmsEducationalexperienceController::class);
    $router->resource('oa/cmf_hrms_expense',CmfHrmsExpenseController::class);
    $router->resource('oa/cmf_hrms_expense_type',CmfHrmsExpenseTypeController::class);
    $router->resource('oa/cmf_hrms_file',CmfHrmsFileController::class);
    $router->resource('oa/cmf_hrms_file_fuzhi',CmfHrmsFileFuzhiController::class);
    $router->resource('oa/cmf_hrms_file_lizhi',CmfHrmsFileLizhiController::class);
    $router->resource('oa/cmf_hrms_file_luyong',CmfHrmsFileLuyongController::class);
    $router->resource('oa/cmf_hrms_laboringskill',CmfHrmsLaboringskillController::class);
    $router->resource('oa/cmf_hrms_reward_punishment',CmfHrmsRewardPunishmentController::class);
    $router->resource('oa/cmf_hrms_r_p',CmfHrmsRPController::class);
    $router->resource('oa/cmf_hrms_r_p_name',CmfHrmsRPNameController::class);
    $router->resource('oa/cmf_hrms_r_p_status',CmfHrmsRPStatusController::class);
    $router->resource('oa/cmf_hrms_socialrelation',CmfHrmsSocialrelationController::class);
    $router->resource('oa/cmf_hrms_transfer',CmfHrmsTransferController::class);
    $router->resource('oa/cmf_hrms_transfer_type',CmfHrmsTransferTypeController::class);
    $router->resource('oa/cmf_hrms_worker_hetong',CmfHrmsWorkerHetongController::class);
    $router->resource('oa/cmf_hrms_worker_zhengzhao',CmfHrmsWorkerZhengzhaoController::class);
    $router->resource('oa/cmf_hrms_worker_zhicheng',CmfHrmsWorkerZhichengController::class);
    $router->resource('oa/cmf_hrms_workexperience',CmfHrmsWorkexperienceController::class);
    $router->resource('oa/cmf_hrms_work_status',CmfHrmsWorkStatusController::class);
    $router->resource('oa/cmf_hrms_zhiwei_status',CmfHrmsZhiweiStatusController::class);
    $router->resource('oa/cmf_hrms_zpjihua',CmfHrmsZpjihuaController::class);
    $router->resource('oa/cmf_hrms_zprencaiku',CmfHrmsZprencaikuController::class);
    $router->resource('oa/cmf_huikuanplan',CmfHuikuanplanController::class);
    $router->resource('oa/cmf_huikuanrecord',CmfHuikuanrecordController::class);
    $router->resource('oa/cmf_ifneed',CmfIfneedController::class);
    $router->resource('oa/cmf_important',CmfImportantController::class);
    $router->resource('oa/cmf_inorout',CmfInoroutController::class);
    $router->resource('oa/cmf_kaipiaorecord',CmfKaipiaorecordController::class);
    $router->resource('oa/cmf_kaipiaostate',CmfKaipiaostateController::class);
    $router->resource('oa/cmf_linkman',CmfLinkmanController::class);
    $router->resource('oa/cmf_measure',CmfMeasureController::class);
    $router->resource('oa/cmf_message',CmfMessageController::class);
    $router->resource('oa/cmf_modifyrecord',CmfModifyrecordController::class);
    $router->resource('oa/cmf_notify',CmfNotifyController::class);
    $router->resource('oa/cmf_numzero',CmfNumzeroController::class);
    $router->resource('oa/cmf_officeguihuanstate',CmfOfficeguihuanstateController::class);
    $router->resource('oa/cmf_officeproductbaofei',CmfOfficeproductbaofeiController::class);
    $router->resource('oa/cmf_officeproductcangku',CmfOfficeproductcangkuController::class);
    $router->resource('oa/cmf_officeproduct',CmfOfficeproductController::class);
    $router->resource('oa/cmf_officeproductgroup',CmfOfficeproductgroupController::class);
    $router->resource('oa/cmf_officeproductin',CmfOfficeproductinController::class);
    $router->resource('oa/cmf_officeproductleibie',CmfOfficeproductleibieController::class);
    $router->resource('oa/cmf_officeproductout',CmfOfficeproductoutController::class);
    $router->resource('oa/cmf_officeproducttiaoku',CmfOfficeproducttiaokuController::class);
    $router->resource('oa/cmf_officeproducttui',CmfOfficeproducttuiController::class);
    $router->resource('oa/cmf_office_task',CmfOfficeTaskController::class);
    $router->resource('oa/cmf_paystate',CmfPaystateController::class);
    $router->resource('oa/cmf_productcolor',CmfProductcolorController::class);
    $router->resource('oa/cmf_product',CmfProductController::class);
    $router->resource('oa/cmf_producttype',CmfProducttypeController::class);
    $router->resource('oa/cmf_productzuzhuang2_detail',CmfProductzuzhuang2DetailController::class);
    $router->resource('oa/cmf_productzuzhuang',CmfProductzuzhuangController::class);
    $router->resource('oa/cmf_productzuzhuang_detail',CmfProductzuzhuangDetailController::class);
    $router->resource('oa/cmf_productzuzhuangstate',CmfProductzuzhuangstateController::class);
    $router->resource('oa/cmf_property',CmfPropertyController::class);
    $router->resource('oa/cmf_recycle_bin',CmfRecycleBinController::class);
    $router->resource('oa/cmf_salemode',CmfSalemodeController::class);
    $router->resource('oa/cmf_sellbilltype',CmfSellbilltypeController::class);
    $router->resource('oa/cmf_sellcontract_jiaofu',CmfSellcontractJiaofuController::class);
    $router->resource('oa/cmf_sellplanmain',CmfSellplanmainController::class);
    $router->resource('oa/cmf_sellplanmain_detail_color',CmfSellplanmainDetailColorController::class);
    $router->resource('oa/cmf_sellplanmain_detail',CmfSellplanmainDetailController::class);
    $router->resource('oa/cmf_sellplanstate',CmfSellplanstateController::class);
    $router->resource('oa/cmf_shoupiaorecord',CmfShoupiaorecordController::class);
    $router->resource('oa/cmf_sms_sendlist',CmfSmsSendlistController::class);
    $router->resource('oa/cmf_stockchangemain',CmfStockchangemainController::class);
    $router->resource('oa/cmf_stockchangemain_detail',CmfStockchangemainDetailController::class);
    $router->resource('oa/cmf_stockchangestate',CmfStockchangestateController::class);
    $router->resource('oa/cmf_stock',CmfStockController::class);
    $router->resource('oa/cmf_stockinmain',CmfStockinmainController::class);
    $router->resource('oa/cmf_stockinmain_detail_color',CmfStockinmainDetailColorController::class);
    $router->resource('oa/cmf_stockinmain_detail',CmfStockinmainDetailController::class);
    $router->resource('oa/cmf_stockoutmain',CmfStockoutmainController::class);
    $router->resource('oa/cmf_stockoutmain_detail_color',CmfStockoutmainDetailColorController::class);
    $router->resource('oa/cmf_stockoutmain_detail',CmfStockoutmainDetailController::class);
    $router->resource('oa/cmf_storeaccesstype',CmfStoreaccesstypeController::class);
    $router->resource('oa/cmf_storecheck',CmfStorecheckController::class);
    $router->resource('oa/cmf_storecheck_detail',CmfStorecheckDetailController::class);
    $router->resource('oa/cmf_store_color',CmfStoreColorController::class);
    $router->resource('oa/cmf_store',CmfStoreController::class);
    $router->resource('oa/cmf_store_init',CmfStoreInitController::class);
    $router->resource('oa/cmf_supply',CmfSupplyController::class);
    $router->resource('oa/cmf_supplylever',CmfSupplyleverController::class);
    $router->resource('oa/cmf_supplylinkman',CmfSupplylinkmanController::class);
    $router->resource('oa/cmf_supplyproduct',CmfSupplyproductController::class);
    $router->resource('oa/cmf_sys_code',CmfSysCodeController::class);
    $router->resource('oa/cmf_calendar',CmfCalendarController::class);
    $router->resource('oa/cmf_sys_function',CmfSysFunctionController::class);
    $router->resource('oa/cmf_sys_menu',CmfSysMenuController::class);
    $router->resource('oa/cmf_systemconfig',CmfSystemconfigController::class);
    $router->resource('oa/cmf_systemhelp',CmfSystemhelpController::class);
    $router->resource('oa/cmf_systemlang',CmfSystemlangController::class);
    $router->resource('oa/cmf_system_logall',CmfSystemLogallController::class);
    $router->resource('oa/cmf_system_log',CmfSystemLogController::class);
    $router->resource('oa/cmf_system_logtype',CmfSystemLogtypeController::class);
    $router->resource('oa/cmf_systemprivateconfig',CmfSystemprivateconfigController::class);
    $router->resource('oa/cmf_systemprivate',CmfSystemprivateController::class);
    $router->resource('oa/cmf_systemprivateinc',CmfSystemprivateincController::class);
    $router->resource('oa/cmf_systemtable',CmfSystemtableController::class);
    $router->resource('oa/cmf_unit',CmfUnitController::class);
    $router->resource('oa/cmf_unitprop',CmfUnitpropController::class);
    $router->resource('oa/cmf_workplanmain',CmfWorkplanmainController::class);
    $router->resource('oa/cmf_workplanmain_detail',CmfWorkplanmainDetailController::class);
    $router->resource('oa/cmf_workplanshenhe',CmfWorkplanshenheController::class);
    $router->resource('oa/cmf_workplanstate',CmfWorkplanstateController::class);
    $router->resource('oa/cmf_workreport',CmfWorkreportController::class);
    $router->resource('oa/cmf_wu_boolean',CmfWuBooleanController::class);
    $router->resource('oa/cmf_wu_buildinginformation',CmfWuBuildinginformationController::class);
    $router->resource('oa/CmfBumenduibi',CmfBumenduibiController::class);
    $router->resource('oa/CmfCaigouyuanhuizong',CmfCaigouyuanhuizongController::class); //采购员汇总
    $router->resource('oa/CmfChanpinxiaoshouhuizong',CmfChanpinxiaoshouhuizongController::class); //产品销售汇总
    $router->resource('oa/CmfChanpinliudong',CmfChanpinliudongController::class); //产品流动汇总
    $router->resource('oa/CmfGongyingshanggonghuohuizong',CmfGongyingshanggonghuohuizongController::class); //供应商供货汇总
    $router->resource('oa/CmfKehuxinzengzoushi',CmfKehuxinzengzoushiController::class); //客户新增走势
    $router->resource('oa/CmfXiaoshoubaobiao',CmfXiaoshoubaobiaoController::class); //销售日报

});
