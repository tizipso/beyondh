<?php

declare(strict_types=1);

namespace Beyondh\Hotel;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 查询酒店房量房价
     *
     * 可以根据商圈/地理位置/客源/星级及服务标签等分页查询某一时间段符合条件的酒店的房价房量
     *
     * @param string      $ArriveTime           预计入住时间
     * @param string      $DepartureTime        预计离店时间
     * @param bool        $OnlyOpenedOrg        是否只查询开放接口的酒店信息
     * @param bool        $PhysicalRoomTypeOnly 只查询物理房型
     * @param bool        $BasicInfoOnly        只查询酒店基本信息
     * @param bool        $IncludeDetailCounts  包含每天的房量信息
     * @param bool        $IncludePrices        包含房价信息
     * @param bool        $IncludeRoomCounts    包含房量信息
     * @param array|null  $OrgIds               酒店Ids
     * @param string|null $OrgName              酒店名称
     * @param array|null  $OrgSns               酒店编号
     * @param string|null $CityId               城市Id
     * @param string|null $DistrictId           区域
     * @param int|null    $Star                 星级评分
     * @param string|null $CommercialLocationId 商圈
     * @param float|null  $Latitude             纬度
     * @param float|null  $Longitude            经度
     * @param int|null    $Distance             距离
     * @param array|null  $ServiceTags          服务标签
     * @param string|null $CheckInType          入住类型
     * @param array|null  $RoomTypeIds          要查询的房型Id
     * @param array|null  $RoomStatuses         房态
     * @param array|null  $MemberLevels         会员级别
     * @param string|null $RateCode             房价码
     * @param array|null  $ContractorLevels     协议公司等级
     * @param string|null $SearchType           查询的会员还是协议公司
     * @param array|null  $OrderByRequests      排序参数    排序：目前只支持Star(星级评分),OrgName(酒店名称)排序  {"OrderBy": "Star", "Asc": true}[]  OrderBy[string]=排序字段/Asc[bool]=是否正序
     * @param int|null    $PageSize             分页大小
     * @param int|null    $PageIndex            页码
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SearchOrgWithRoomPriceAndRoomCount(string $ArriveTime, string $DepartureTime, bool $OnlyOpenedOrg, bool $PhysicalRoomTypeOnly, bool $BasicInfoOnly, bool $IncludeDetailCounts, bool $IncludePrices, bool $IncludeRoomCounts, array $OrgIds = null, string $OrgName = null, array $OrgSns = null, string $CityId = null, string $DistrictId = null, int $Star = null, string $CommercialLocationId = null, float $Latitude = null, float $Longitude = null, int $Distance = null, array $ServiceTags = null, string $CheckInType = null, array $RoomTypeIds = null, array $RoomStatuses = null, array $MemberLevels = null, string $RateCode = null, array $ContractorLevels = null, string $SearchType = null, array $OrderByRequests = null, int $PageSize = null, int $PageIndex = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.SearchOrgWithRoomPriceAndRoomCount',
                'content' => [
                    'ArriveTime' => $ArriveTime,
                    'DepartureTime' => $DepartureTime,
                    'OrgIds' => $OrgIds,
                    'OrgName' => $OrgName,
                    'OrgSns' => $OrgSns,
                    'CityId' => $CityId,
                    'DistrictId' => $DistrictId,
                    'Star' => $Star,
                    'CommercialLocationId' => $CommercialLocationId,
                    'Latitude' => $Latitude,
                    'Longitude' => $Longitude,
                    'Distance' => $Distance,
                    'ServiceTags' => $ServiceTags,
                    'OnlyOpenedOrg' => $OnlyOpenedOrg,
                    'CheckinType' => $CheckInType,
                    'RoomTypeIds' => $RoomTypeIds,
                    'RoomStatuses' => $RoomStatuses,
                    'MemberLevels' => $MemberLevels,
                    'PhysicalRoomTypeOnly' => $PhysicalRoomTypeOnly,
                    'BasicInfoOnly' => $BasicInfoOnly,
                    'IncludeDetailCounts' => $IncludeDetailCounts,
                    'IncludePrices' => $IncludePrices,
                    'IncludeRoomCounts' => $IncludeRoomCounts,
                    'RateCode' => $RateCode,
                    'ContractorLevels' => $ContractorLevels,
                    'SearchType' => $SearchType,
                    'OrderByRequests' => $OrderByRequests,
                    'PageSize' => $PageSize,
                    'PageIndex' => $PageIndex,
                ],
            ],
        ]);
    }

    /**
     * 查询某个酒店信息
     *
     * 该接口可按照酒店Id查询单个酒店的基本信息
     *
     * @param float $OrgId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetOrgInfo(float $OrgId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetOrgInfo',
                'content' => [
                    'OrgId' => $OrgId,
                ]
            ]
        ]);
    }

    /**
     * 查询酒店信息
     *
     * 该接口可按照酒店所在地理位置的经度和维度、距离、酒店服务、酒店名称、所在城市查询酒店的基本信息。
     *
     * @param int|null    $PageIndex       页码
     * @param string|null $OrgName         酒店名称
     * @param string|null $CityId          城市Id
     * @param float|null  $Longitude       经度
     * @param float|null  $Latitude        纬度
     * @param int|null    $Distance        距离
     * @param array|null  $ServiceTags     服务标签
     * @param int|null    $PageSize        分页大小
     * @param array|null  $OrderByRequests 排序：目前只支持Star(星级评分),OrgName(酒店名称)排序  {"OrderBy": "Star", "Asc": true}[]  OrderBy[string]=排序字段/Asc[bool]=是否正序
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetOrgs(int $PageIndex = null, string $OrgName = null, string $CityId = null, float $Longitude = null, float $Latitude = null, int $Distance = null, array $ServiceTags = null, int $PageSize = null, array $OrderByRequests = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetOrgs',
                'content' => [
                    'Longitude' => $Longitude,
                    'Latitude' => $Latitude,
                    'Distance' => $Distance,
                    'OrderByRequests' => $OrderByRequests,
                    'ServiceTags' => $ServiceTags,
                    'PageIndex' => $PageIndex,
                    'PageSize' => $PageSize,
                    'OrgName' => $OrgName,
                    'CityId' => $CityId,
                ],
            ],
        ]);
    }

    /**
     * 查询会员时租价格
     *
     * @param float      $OrgId         酒店Id
     * @param string     $ArriveTime    抵店时间
     * @param string     $DepartureTime 离店时间
     * @param array|null $MemberLevels  会员级别
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetMemberHourRentPrice(float $OrgId, string $ArriveTime, string $DepartureTime, array $MemberLevels = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetOrgs',
                'content' => [
                    'OrgId' => $OrgId,
                    'ArriveTime' => $ArriveTime,
                    'DepartureTime' => $DepartureTime,
                    'MemberLevels' => $MemberLevels,
                ],
            ],
        ]);
    }

    /**
     * 查询可用房间
     *
     * 该接口可按照抵店和离店时间、楼栋和楼层号等条件查询酒店可用房
     *
     * @param float      $OrgId            酒店Id
     * @param string     $ArriveTime       抵店时间
     * @param string     $DepartureTime    离店时间
     * @param string     $CheckInType      入住类型    正常（Normal），长包（LongTerm），时租（Hour...）(见数据字典）
     * @param array|null $HallIds          楼栋号
     * @param array|null $FloorIds         楼层号
     * @param array|null $RoomAttributeIds 特性
     * @param array|null $RoomTypeIds      房型
     * @param array|null $RoomStatuses     房间状态
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetAvailableRooms(float $OrgId, string $ArriveTime, string $DepartureTime, string $CheckInType, array $HallIds = null, array $FloorIds = null, array $RoomAttributeIds = null, array $RoomTypeIds = null, array $RoomStatuses = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetAvailableRooms',
                'content' => [
                    'OrgId' => $OrgId,
                    'ArriveTime' => $ArriveTime,
                    'DepartureTime' => $DepartureTime,
                    'CheckinType' => $CheckInType,
                    'HallIds' => $HallIds,
                    'FloorIds' => $FloorIds,
                    'RoomAttributeIds' => $RoomAttributeIds,
                    'RoomTypeIds' => $RoomTypeIds,
                    'RoomStatuses' => $RoomStatuses,
                ],
            ],
        ]);
    }

    /**
     * 添加房间评论
     *
     * 该接口提供了添加酒店房间评论功能，客户可以通过此接口对酒店在住时或退房时的房间进行评论给酒店反馈意见。
     *
     * 在以下情况下需要调用此接口：
     * ◆ 客人住房后可发表评论
     * ◆ 客人退房后可发表评论
     *
     * @param float    $OrgId         酒店Id
     * @param float    $CheckInId     客人入住Id
     * @param string   $MemberId      会员Id
     * @param string   $Remark        备注
     * @param int|null $CleanScore    清扫打分
     * @param int|null $FacilityScore 设施打分
     * @param int|null $ServiceScore  服务打分
     * @param int|null $LocationScore 位置打分
     * @param int|null $IsAlsoCheckIn 是否还会入住
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddRoomRemark(float $OrgId, float $CheckInId, string $MemberId, string $Remark, int $CleanScore = null, int $FacilityScore = null, int $ServiceScore = null, int $LocationScore = null, int $IsAlsoCheckIn = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.AddRoomRemark',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinId' => $CheckInId,
                    'MemberId' => $MemberId,
                    'CleanScore' => $CleanScore,
                    'FacilityScore' => $FacilityScore,
                    'ServiceScore' => $ServiceScore,
                    'Remark' => $Remark,
                    'LocationScore' => $LocationScore,
                    'IsAlsoCheckIn' => $IsAlsoCheckIn,
                ],
            ],
        ]);
    }

    /**
     * 查询我的房间评论
     *
     * 该接口可按照酒店Id、入住Id及会员Id查询自己的房间评论。
     *
     * @param string     $MemberId  会员Id
     * @param int        $PageIndex 页码
     * @param int        $PageSize  分页大小
     * @param float|null $OrgId     酒店Id
     * @param float|null $CheckInId 客人入住Id
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetMyRoomRemarks(string $MemberId, int $PageIndex, int $PageSize, float $OrgId = null, float $CheckInId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetMyRoomRemarks',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinId' => $CheckInId,
                    'MemberId' => $MemberId,
                    'PageIndex' => $PageIndex,
                    'PageSize' => $PageSize,
                ],
            ],
        ]);
    }

    /**
     * 查询酒店小商品
     *
     * 该接口可按照酒店标识查询酒店可售小商品
     *
     * @param float $OrgId 酒店Id
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetOrgGoods(float $OrgId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetOrgGoods',
                'content' => [
                    'OrgId' => $OrgId,
                ],
            ],
        ]);
    }

    /**
     * 查询酒店房型信息
     *
     * 查询酒店的房型信息，包括物理房型和虚拟房型。
     *
     * @param float       $OrgId
     * @param string|null $RoomTypeId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetOrgRoomTypes(float $OrgId, string $RoomTypeId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetOrgRoomTypes',
                'content' => [
                    'OrgId' => $OrgId,
                    'RoomTypeId' => $RoomTypeId,
                ],
            ],
        ]);
    }

    /**
     * 查询渠道房量配额
     *
     * 查询酒店房型在渠道中配置的可售数量。
     *
     * @param float      $OrgIds         酒店Id
     * @param string     $SearchRoomType 房型类型    All：查询所有；OnlyPhysicalRoomType：只查询物理房型；OnlyVirtualRoomType、只查询虚房型。 该条件优先于房型条件，比如：设置只查询物理房型，房型条件中包含虚房型则无法查询出虚房型
     * @param string     $BeginDate      开始日期
     * @param string     $EndDate        结束日期
     * @param array|null $RoomTypeIds    房型ID
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetChannelQuota(float $OrgIds, string $SearchRoomType, string $BeginDate, string $EndDate, array $RoomTypeIds = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetChannelQuota',
                'content' => [
                    'OrgIds' => $OrgIds,
                    'RoomTypeIds' => $RoomTypeIds,
                    'SearchRoomType' => $SearchRoomType,
                    'BeginDate' => $BeginDate,
                    'EndDate' => $EndDate,
                ],
            ],
        ]);
    }

    /**
     * 查询房态
     *
     * @param float $OrgId   酒店Id
     * @param array $RoomNos 房间号数组
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetRoomStatus(float $OrgId, array $RoomNos): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetRoomStatus',
                'content' => [
                    'OrgId' => $OrgId,
                    'RoomNos' => $RoomNos,
                ],
            ],
        ]);
    }

    /**
     * 申请查房
     *
     * @param float $OrgId  酒店Id
     * @param array $Rounds 查房信息
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function ApplyRounds(float $OrgId, array $Rounds): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.ApplyRounds',
                'content' => [
                    'OrgId' => $OrgId,
                    'Rounds' => $Rounds,
                ],
            ],
        ]);
    }

    /**
     * 根据编号查询查房状态
     *
     * 根据申请的查房ID查询查房状态
     *
     * @param float $OrgId     酒店Id
     * @param array $RoundsIds 查房信息编号
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetRoundsByIds(float $OrgId, array $RoundsIds): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetRoundsByIds',
                'content' => [
                    'OrgId' => $OrgId,
                    'RoundsIds' => $RoundsIds,
                ],
            ],
        ]);
    }

    /**
     * 查询酒店所有评论
     *
     * @param float    $OrgId     酒店Id
     * @param int      $PageIndex 页码
     * @param int|null $PageSize  分页大小
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetRoomRemarks(float $OrgId, int $PageIndex, int $PageSize = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetRoomRemarks',
                'content' => [
                    'OrgId' => $OrgId,
                    'PageIndex' => $PageIndex,
                    'PageSize' => $PageSize ?? 15,
                ],
            ],
        ]);
    }

    /**
     * 查询酒店状态变更记录
     *
     * @param float    $OrgId     酒店Id
     * @param string   $StartDate 开始日期
     * @param string   $EndDate   结束日期
     * @param int      $PageIndex 页码
     * @param int|null $PageSize  分页大小
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetHotelStatsChangedRecords(float $OrgId, string $StartDate, string $EndDate, int $PageIndex, int $PageSize = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetHotelStatsChangedRecords',
                'content' => [
                    'OrgId' => $OrgId,
                    'StartDate' => $StartDate,
                    'EndDate' => $EndDate,
                    'PageIndex' => $PageIndex,
                    'PageSize' => $PageSize ?? 15,
                ],
            ],
        ]);
    }

    /**
     * 更新酒店信息
     *
     * @param float       $OrgId     酒店Id
     * @param string|null $OrgName   酒店名称
     * @param string|null $CityId    城市ID
     * @param string|null $Address   地址
     * @param string|null $Phone     电话
     * @param float|null  $Longitude 经度
     * @param float|null  $Latitude  纬度
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function UpdateOrgByOrgId(float $OrgId, string $OrgName = null, string $CityId = null, string $Address = null, string $Phone = null, float $Longitude = null, float $Latitude = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.UpdateOrgByOrgId',
                'content' => [
                    'OrgId' => $OrgId,
                    'OrgName' => $OrgName,
                    'CityId' => $CityId,
                    'Address' => $Address,
                    'Phone' => $Phone,
                    'Longitude' => $Longitude,
                    'Latitude' => $Latitude,
                ],
            ],
        ]);
    }

    /**
     * 查询酒店当前营业日
     *
     * @param float $OrgId 酒店Id
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetBusinessDate(float $OrgId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetBusinessDate',
                'content' => [
                    'OrgId' => $OrgId,
                ],
            ],
        ]);
    }

    /**
     * 查询酒店是否在渠道上线
     *
     * @param float  $OrgId   酒店Id
     * @param string $Channel 渠道
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function QueryHotelIsOnline(float $OrgId, string $Channel): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.QueryHotelIsOnline',
                'content' => [
                    'OrgId' => $OrgId,
                    'Channel' => $Channel,
                ],
            ],
        ]);
    }

    /**
     * 修改酒店房间锁房状态
     *
     * @param float  $OrgId      酒店Id
     * @param string $RoomNumber 房间号
     * @param bool   $IsLocked   状态  true：锁房，false：解放
     * @param string $Remark     备注
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function ModifyRoomLockStatus(float $OrgId, string $RoomNumber, bool $IsLocked, string $Remark): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.ModifyRoomLockStatus',
                'content' => [
                    'OrgId' => $OrgId,
                    'RoomNumber' => $RoomNumber,
                    'IsLocked' => $IsLocked,
                    'Remark' => $Remark,
                ],
            ],
        ]);
    }

    /**
     * 查询酒店房间信息列表
     *
     * @param float       $OrgId      酒店Id
     * @param string|null $RoomNumber 房间号
     * @param string|null $RoomTypeId 房型编码
     * @param string|null $RoomStatus 房间状态
     * @param bool|null   $IsActive   是否激活
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetRoomInfos(float $OrgId, string $RoomNumber = null, string $RoomTypeId = null, string $RoomStatus = null, bool $IsActive = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Hotel.GetRoomInfos',
                'content' => [
                    'OrgId' => $OrgId,
                    'RoomNumber' => $RoomNumber,
                    'RoomTypeId' => $RoomTypeId,
                    'RoomStatus' => $RoomStatus,
                    'IsActive' => $IsActive,
                ],
            ],
        ]);
    }
}