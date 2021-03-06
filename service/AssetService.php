<?php
include_once '../repository/AssetRepository.php';
include_once '../interfaces/IService.php';
include_once '../config/Database.php';

class AssetService implements IService
{

    /**
     * @inheritDoc
     */
    static function findOneById($id)
    {
        // get database connection
        $database = new Database();
        $db = $database->getConnection();

        // create a repository instance
        $ar = new AssetRepository($db);

        $asset = $ar->find($id);

        if($asset->getName()!=null)
        {
            //everything went OK, asset was found
            http_response_code(200);

            echo json_encode($asset);
        }
        else {
            http_response_code(404); // asset was not found
            echo json_encode(["message" => "Asset does not exist"]);
        }
    }

    /**
     * @inheritDoc
     */
    static function findAll()
    {
        // get database connection
        $database = new Database();
        $db = $database->getConnection();

        // create a repository instance
        $ar = new AssetRepository($db);

        $assets = $ar->findAll();

        if($assets['count']>0)
        {
            http_response_code(200);
            echo json_encode($assets["assets"]);
        }
        else
        {
            http_response_code(404);
            echo json_encode(array("message" => "No assets were found"));
        }
    }

    /**
     * @inheritDoc
     */
    static function addNew($object)
    {
        // TODO: Implement addNew() method.
    }

    /**
     * @inheritDoc
     */
    static function deleteOneById($id)
    {
        // TODO: Implement deleteOneById() method.
    }

    /**
     * @inheritDoc
     */
    static function findOneBy($key_value)
    {
        // TODO: Implement findOneBy() method.
    }
}