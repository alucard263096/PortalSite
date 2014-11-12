<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 class RequisitionMgr
 {
 	private static $instance = null;
	public static $dbmgr = null;
	public static function getInstance() {
		return self :: $instance != null ? self :: $instance : new RequisitionMgr();
	}

	private function __construct() {
		
	}
	
	public  function __destruct ()
	{
		
	}
  
  public function checkHasRequisition($qq,$phone,$companyname)
  {
		$qq=trim(parameter_filter($qq));
		$phone=trim(parameter_filter($phone));
		$$company_name=trim(parameter_filter($$company_name));
    
    $sql="select count(1) from tb_requisition 
    where ('$qq'<>'' and qq='$qq')
    or ('$qq'<>'' and phone='$phone' )
    or ('$company_name'<>'' and $company_name )";
    
    $query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array_all($query);
    
    return count($result)>0;
  }
  
  public function getRequisition($id){
  
		$id=parameter_filter($id);
		$sql="select *
		from tb_requisition
		where id=$id ";
		
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array($query); 
		return $result;
  }
	
	//status P 申请中，A 完成，I 拒绝
	
	public function searchDownloadCategory($name,$phone,$qq,$companyname,$com_phone,$com_address,$status)
	{
		$name=parameter_filter($name);
		$phone=parameter_filter($phone);
		$qq=parameter_filter($qq);
		$companyname=parameter_filter($companyname);
		$com_phone=parameter_filter($com_phone);
		$com_address=parameter_filter($com_address);
		$status=parameter_filter($status);
    
		if($name==""){
			$sql="select distinct dt.seq,dt.id,dt.name,dt.status
		,dt.created_user,c.user_name created_username,dt.created_date
		,dt.updated_user,u.user_name updated_username,dt.updated_date 
		from tb_download_category dt
		left join tb_user c on dt.created_user=c.user_id
		left join tb_user u on dt.updated_user=u.user_id
		where  dt.status like '%$status%'
		and dt.status <>'D' 
		order by dt.seq";
		}else{
		$sql="select distinct dt.seq,dt.id,dt.name,dt.status
		,dt.created_user,c.user_name created_username,dt.created_date
		,dt.updated_user,u.user_name updated_username,dt.updated_date 
		from tb_download_category dt
		inner join tb_download_file df on dt.id=df.category_id
		left join tb_user c on dt.created_user=c.user_id
		left join tb_user u on dt.updated_user=u.user_id
		where df.name like '%$name%' 
		and dt.status like '%$status%'
		and dt.status <>'D' 
		and df.status <>'D' 
		order by dt.seq";
		}
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array_all($query); 
		
		$sum=count($result);
		for($i=0;$i<$sum;$i++)
		{
			$result[$i]["filelist"]=$this->getFileListByCategory($result[$i]["id"]);
		}
		
		return $result;
	}
	
	
	
	
	
	
		
 public function save($id,$name,$seq,$status,$filelist,$sysUser_id)
	{
		$id=parameter_filter($id);
		$name=parameter_filter($name);
		$seq=parameter_filter($seq);
		$status=parameter_filter($status);
		$this->dbmgr->begin_trans();
		
			
			$sql="select ifnull(max(id),0)+1 from tb_download_category";
			$query = $this->dbmgr->query($sql);
			$result = $this->dbmgr->fetch_array($query); 
			
			$id=$result[0];
			$sql="insert into `tb_download_category` 
	(id, name, seq, status, created_user, 
	created_date, updated_user, 
	updated_date)
	values
	($id, '$name', $seq, '$status', $sysUser_id, 
	now(), $sysUser_id, 
	now())";
  
			$query = $this->dbmgr->query($sql);
			
		$this->dbmgr->commit_trans();
		
		return "right".$id;
	}
  
  public function editStatus($id,$status,$description){
    
		$id=parameter_filter($id);
		$status=parameter_filter($status);
		$description=parameter_filter($description);
    
    $sql="update tb_requisition set status='$status',
                                    description='$description',
                                    $process_date=now()
                                    where id=$id";
                                    
                                    
			$query = $this->dbmgr->query($sql);
      return "right";
    
  }
	
 }
 
 $requisitionMgr=RequisitionMgr::getInstance();
 $requisitionMgr->dbmgr=$dbmgr;
 
 
 
 
?>