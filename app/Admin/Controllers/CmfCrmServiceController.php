<?php

namespace App\Admin\Controllers;

use App\Models\CmfCrmService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCrmServiceController extends AdminController {

	protected $title = "服务";

    public function index(Content $content)
    {
        return $content
            ->header('服务')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmService());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('serviceId', __('服务ID'));
                $grid->column('serviceStage', '服务阶段')
                    ->display(function ($ifpay) {
                        return $ifpay ? '<span style="color:green;">已完成</span>' : '<span style="color:red;">未完成</span>';
                    });
                $grid->column('lastLimited', __('最后期限'));                
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCrmService());
                $form->text('serviceId', __('服务ID'))
                ->creationRules('required|max:200|unique:cmf_crm_service',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->radio('serviceStage', __('服务阶段'))->options(['1' => '已完成','0' => '未完成'])
                ->rules('required');
                $form->datetime('lastLimited', __('最后期限'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->textarea('serviceSummary', __('服务总结'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('clientName', __('客户名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('linkMan', __('联系人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('seriousDegree', __('严重程度'))->options(['1' => '一般','0' => '很严重','2' => '非常严重'])
                 ->rules('required');
                $form->text('solveMan', __('解决人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('solveMethod', __('解决方法'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('solveStatus', __('处理状态'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('isExamine', __('是否审核'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('examineMan', __('审核人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('examineTime', __('审核时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->textarea('note', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('attach', __('附件'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',
                        ['requied' => '此项不能为空']);
                $form->textarea('relationSaleList', __('相关销售列表'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('customTwo', __('自定义二'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('customThree', __('自定义三'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('customFour', __('自定义四'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('customFive', __('自定义五'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('服务');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('服务')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCrmService());
        return $content
            ->header('服务')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmService::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('serviceId', __('服务ID'));
        $show->field('serviceStage', __('服务阶段'))->as(function($serviceStage) {
            if($serviceStage == 1) {
                $serviceStage='已完成';
            }else {
                $serviceStage='未完成';
            }
            return $serviceStage;
        });
        $show->field('lastLimited', __('最后期限'));
        $show->field('serviceSummary', __('服务总结'));
        $show->field('clientName', __('客户名称'));
        $show->field('linkMan', __('联系人'));
        $show->field('seriousDegree', __('严重程度'));
        $show->field('seriousDegree', __('严重程度'))->as(function($seriousDegree) {
            if($seriousDegree == 1) {
                $seriousDegree='一般';
            }else if($seriousDegree == 0) {
                $seriousDegree='很严重';
            }else {
                $seriousDegree='非常严重';
            }
            return $seriousDegree;
        });
        $show->field('solveMan', __('解决人'));
        $show->field('solveMethod', __('解决方法'));
        $show->field('solveStatus', __('处理状态'))->as(function($solveStatus) {
            if($solveStatus == 1) {
                $solveStatus='已处理';
            }else {
                $solveStatus='未处理';
            }
            return $solveStatus;
        });
        $show->field('isExamine', __('是否审核'))->as(function($isExamine) {
            if($isExamine == 1) {
                $isExamine='已完成';
            }else {
                $isExamine='未完成';
            }
            return $isExamine;
        });
        $show->field('examineMan', __('审核人'));
        $show->field('examineTime', __('审核时间'));
        $show->field('note', __('备注'));
        $show->field('attach', __('附件'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('relationSaleList', __('相关销售列表'));
        $show->field('customTwo', __('自定义二'));
        $show->field('customThree', __('自定义三'));
        $show->field('customFour', __('自定义四'));
        $show->field('customFive', __('自定义五'));
        return $show;
        }
}

?>