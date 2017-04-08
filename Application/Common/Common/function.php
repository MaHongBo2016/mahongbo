<?php

//递归排序
function sortDept($data,$pid = 0,$level = 0){
    static $arr = array();
    foreach ($data as $key=>$value){
        if ($value['pid'] == $pid){
            $value['level'] = $level;
            $arr[] = $value;
            sortDept($data,$value['id'],$level+1);
        }
    }
    return $arr;
}

//多维数组分类
function Arrays($data,$pid = 0){
    $arr = array();
    foreach ($data as $value){
        if ($value['pid'] == $pid){
            $value['child'] = Arrays($data,$value['id']);
            $arr[] = $value;
        }
    }
    return $arr;
}

//<form name="searchForm" action="http://www.zhaozhao.com/index.php/Search/index/" method="get">
//                    <ul id="searchType">
//                        <li data-searchtype="1" class="type_selected">职位</li>
//                        <li data-searchtype="4">公司</li>
//                    </ul>
//                    <div class="searchtype_arrow"></div>
//                    <input type="text" id="search_input" name="name" tabindex="1" value="" placeholder="请输入职位名称，如：产品经理"/>
//
//                    <input type="submit" id="search_button" value="搜索"/>
//
//                </form>