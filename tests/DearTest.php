<?php

namespace UmiMood\Dear\Test;

use PHPUnit\Framework\TestCase;
use UmiMood\Dear\Dear;
use ReflectionClass;

/**
 * Class DearTest
 * @package UmiMood\Dear\Test
 */
class DearTest extends TestCase
{
    protected $application;

    protected static $methods = [
        'account',
        'AttributeSet',
        'BankAccount',
        'Brand',
        'Carrier',
        'Customer',
        'FixedAssetType',
        'Journal',
        'Location',
        'Me',
        'MeAddress',
        'MeContact',
        'PaymentTerm',
        'Product',
        'ProductAvailability',
        'ProductCategory',
        'ProductFamily',
        'Supplier',
        'Tax',
        'Transaction',
        'UnitOfMeasure',
    ];

    public function setUp()
    {
        $this->application = Dear::create(null, null);
    }

    protected function getRandomCode()
    {
        return substr(md5(microtime()),rand(0,26),6);
    }

    protected function getId($response, $method)
    {
        $class = substr($method, 4);
        switch ($class) {

            case "Account":
                return $response["AccountsList"][0]["Code"];
                break;
            case "AttributeSet":
                return $response['LocationList']['ID'];
                break;

            case "Brand":
                return $response["ID"];
                break;
            case "Carrier":
                return $response['CarrierList'][0]['CarrierID'];
                break;
            case "Customer":
                return $response['CustomerList'][0]['ID'];
                break;
            case "FixedAssetType":
                return $response['FixedAssetTypeList'][0]['FixedAssetTypeID'];
                break;

            case "Location":
                return $response["ID"];
                break;

            case "MeAddress":
                return $response["MeAddressesList"][0]["AddressID"];
                break;

            case "MeContact":
                return $response["MeContactsList"][0]["ContactID"];
                break;

            case "PaymentTerm":
                return $response['PaymentTermList'][0]['ID'];
                break;

            case "ProductCategory":
                return $response["ID"];
                break;

            case "Supplier":
                return $response['SupplierList'][0]['ID'];
                break;

            case "Tax":
                return $response['TaxRuleList'][0]['ID'];
                break;
            case "UnitOfMeasure":
                return $response["ID"];
                break;
        }
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(Dear::class, $this->application);
    }

    public function testAccount()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\Account");
        $response = $this->application->Account()->get([]);

        $this->assertNotEmpty($response, "Test: Account");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Code" => $randomCode,
                "Status" => "ACTIVE",
                "Name" => "Test Account",
                "Type" => "CURRLIAB",
                "Description" => "Test Description",
                "Class" => "LIABILITY",
                "SystemAccount" => "Accounts Payable",
                "SystemAccountCode" => "CREDITORS"
            ];

            $response = $this->application->Account()->create($params);

            $this->assertNotEmpty($response, "Test: Account");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Code" => $randomCode,
                "Status" => "ACTIVE",
                "Name" => "Test Account",
                "Type" => "CURRLIAB",
                "Description" => "Test Description",
                "Class" => "LIABILITY",
                "SystemAccount" => "Accounts Payable",
                "SystemAccountCode" => "CREDITORS"
            ];

            $response = $this->application->Account()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Account()->update($id, [
                'Code' => $params['Code'],
                'Name' => $params['Name'],
                'Class' => $params['Class'],
                'Type' => $params['Type'],
                'Status' => $params['Status'],
            ]);

            $this->assertNotEmpty($response, "Test: Account");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Code" => $randomCode,
                "Status" => "ACTIVE",
                "Name" => "Test Account",
                "Type" => "CURRLIAB",
                "Description" => "Test Description",
                "Class" => "LIABILITY",
                "SystemAccount" => "Accounts Payable",
                "SystemAccountCode" => "CREDITORS"
            ];

            $response = $this->application->Account()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Account()->delete($id, []);

            $this->assertNotEmpty($response, "Test: Account");
        }
    }
    
    public function testGetEndpoints()
    {
        foreach (self::$methods as $method) {
            $response = $this->application->{$method}()->get([]);

            $this->assertNotEmpty($response, "Test: $method");
        }
    }

    public function testAttributeSet()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\AttributeSet");
        $response = $this->application->AttributeSet()->get([]);

        $this->assertNotEmpty($response, "Test: AttributeSet");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Attribute set $randomCode",
                "Attribute1Name" => "AttributeName $randomCode",
                "Attribute1Values" => "$randomCode",
                "Attribute1Type" => "List",
            ];

            $response = $this->application->AttributeSet()->create($params);

            $this->assertNotEmpty($response, "Test: AttributeSet");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Attribute set $randomCode",
                "Attribute1Name" => "AttributeName $randomCode",
                "Attribute1Values" => "$randomCode",
                "Attribute1Type" => "List",
            ];

            $response = $this->application->AttributeSet()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->AttributeSet()->update($id, $params);

            $this->assertNotEmpty($response, "Test: AttributeSet");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Attribute set $randomCode",
                "Attribute1Name" => "AttributeName $randomCode",
                "Attribute1Values" => "$randomCode",
                "Attribute1Type" => "List",
            ];

            $response = $this->application->AttributeSet()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->AttributeSet()->delete($id, []);

            $this->assertNotEmpty($response, "Test: AttributeSet");
        }
    }

    public function testBankAccount()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\BankAccount");
        $response = $this->application->BankAccount()->get([]);

        $this->assertNotEmpty($response, "Test: BankAccount");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [

            ];

            $response = $this->application->BankAccount()->create($params);

            $this->assertNotEmpty($response, "Test: BankAccount");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [

            ];

            $response = $this->application->BankAccount()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->BankAccount()->update($id, $params);

            $this->assertNotEmpty($response, "Test: BankAccount");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [

            ];

            $response = $this->application->BankAccount()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->BankAccount()->delete($id, []);

            $this->assertNotEmpty($response, "Test: BankAccount");
        }
    }

    public function testBrand()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\Brand");
        $response = $this->application->Brand()->get([]);

        $this->assertNotEmpty($response, "Test: Brand");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Brand $randomCode",
            ];

            $response = $this->application->Brand()->create($params);

            $this->assertNotEmpty($response, "Test: Brand");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Brand $randomCode",
            ];

            $response = $this->application->Brand()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Brand()->update($id, $params);

            $this->assertNotEmpty($response, "Test: Brand");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Brand $randomCode",
            ];

            $response = $this->application->Brand()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Brand()->delete($id, []);

            $this->assertNotEmpty($response, "Test: Brand");
        }
    }

    public function testCarrier()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\Carrier");
        $response = $this->application->Carrier()->get([]);

        $this->assertNotEmpty($response, "Test: Carrier");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Description" => "Carrier $randomCode",
            ];

            $response = $this->application->Carrier()->create($params);

            $this->assertNotEmpty($response, "Test: Carrier");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Description" => "Carrier $randomCode",
            ];

            $response = $this->application->Carrier()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Carrier()->update($id, $params);

            $this->assertNotEmpty($response, "Test: Carrier");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Description" => "Carrier $randomCode",
            ];

            $response = $this->application->Carrier()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Carrier()->delete($id, []);

            $this->assertNotEmpty($response, "Test: Carrier");
        }
    }

    public function testCustomer()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\Customer");
        $response = $this->application->Customer()->get([]);

        $this->assertNotEmpty($response, "Test: Customer");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Status" => "ACTIVE",
                "Name" => "Test Customer $randomCode",
                "PaymentTerm" => "30 days",
                "PriceTier" => "Tier 1",
                "Currency" => "AUD",
                "AccountReceivable" => "1200",
                "RevenueAccount" => "4000",
                "TaxRule" => "Auto Look Up",

            ];

            $response = $this->application->Customer()->create($params);

            $this->assertNotEmpty($response, "Test: Customer");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Status" => "ACTIVE",
                "Name" => "Test Customer $randomCode",
                "PaymentTerm" => "30 days",
                "PriceTier" => "Tier 1",
                "Currency" => "AUD",
                "AccountReceivable" => "1200",
                "RevenueAccount" => "4000",
                "TaxRule" => "Auto Look Up",

            ];

            $response = $this->application->Customer()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Customer()->update($id, $params);

            $this->assertNotEmpty($response, "Test: Customer");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Status" => "ACTIVE",
                "Name" => "Test Customer $randomCode",
                "PaymentTerm" => "30 days",
                "PriceTier" => "Tier 1",
                "Currency" => "AUD",
                "AccountReceivable" => "1200",
                "RevenueAccount" => "4000",
                "TaxRule" => "Auto Look Up",

            ];

            $response = $this->application->Customer()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Customer()->delete($id, []);

            $this->assertNotEmpty($response, "Test: Customer");
        }
    }

    public function testFixedAssetType()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\FixedAssetType");
        $response = $this->application->FixedAssetType()->get([]);

        $this->assertNotEmpty($response, "Test: FixedAssetType");
    }

    public function testJournal()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\Journal");
        $response = $this->application->Journal()->get([]);

        $this->assertNotEmpty($response, "Test: Journal");
    }

    public function testLocation()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\Location");
        $response = $this->application->Location()->get([]);

        $this->assertNotEmpty($response, "Test: Location");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Location $randomCode"
            ];

            $response = $this->application->Location()->create($params);

            $this->assertNotEmpty($response, "Test: Location");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Location $randomCode"
            ];

            $response = $this->application->Location()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Location()->update($id, $params);

            $this->assertNotEmpty($response, "Test: Location");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Location $randomCode"
            ];

            $response = $this->application->Location()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Location()->delete($id, []);

            $this->assertNotEmpty($response, "Test: Location");
        }
    }

    public function testMe()
    {
        $response = $this->application->Me()->get([]);
        $this->assertNotEmpty($response, "Test: Me");
    }

    public function testMeAddress()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\MeAddress");
        $response = $this->application->MeAddress()->get([]);

        $this->assertNotEmpty($response, "Test: MeAddress");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Line1" => "business address $randomCode",
                "Line2" => null,
                "CitySuburb" => "DEFAULT City",
                "StateProvince" => "DEFAULT State",
                "ZipPostCode" => "DEFAULT Postcode",
                "Country" => "Australia",
                "Type" => "Business",
                "DefaultForType" => true
            ];

            $response = $this->application->MeAddress()->create($params);

            $this->assertNotEmpty($response, "Test: MeAddress");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Line1" => "business address $randomCode",
                "Line2" => null,
                "CitySuburb" => "DEFAULT City",
                "StateProvince" => "DEFAULT State",
                "ZipPostCode" => "DEFAULT Postcode",
                "Country" => "Australia",
                "Type" => "Business",
                "DefaultForType" => true
            ];

            $response = $this->application->MeAddress()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->MeAddress()->update($id, $params);

            $this->assertNotEmpty($response, "Test: MeAddress");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Line1" => "business address $randomCode",
                "Line2" => null,
                "CitySuburb" => "DEFAULT City",
                "StateProvince" => "DEFAULT State",
                "ZipPostCode" => "DEFAULT Postcode",
                "Country" => "Australia",
                "Type" => "Business",
                "DefaultForType" => true
            ];

            $response = $this->application->MeAddress()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->MeAddress()->delete($id, []);

            $this->assertNotEmpty($response, "Test: MeAddress");
        }
    }

    public function testMeContact()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\MeContact");
        $response = $this->application->MeContact()->get([]);

        $this->assertNotEmpty($response, "Test: MeContact");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Business contact $randomCode",
                "Phone" => "12345678",
                "Fax" => null,
                "Email" => "test@test.com",
                "Website" => null,
                "Comment" => null,
                "Type" => "Business",
                "DefaultForType" => true
            ];

            $response = $this->application->MeContact()->create($params);

            $this->assertNotEmpty($response, "Test: MeContact");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Business contact $randomCode",
                "Phone" => "12345678",
                "Fax" => null,
                "Email" => "test@test.com",
                "Website" => null,
                "Comment" => null,
                "Type" => "Business",
                "DefaultForType" => true
            ];

            $response = $this->application->MeContact()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->MeContact()->update($id, $params);

            $this->assertNotEmpty($response, "Test: MeContact");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Business contact $randomCode",
                "Phone" => "12345678",
                "Fax" => null,
                "Email" => "test@test.com",
                "Website" => null,
                "Comment" => null,
                "Type" => "Business",
                "DefaultForType" => true
            ];

            $response = $this->application->MeContact()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->MeContact()->delete($id, []);

            $this->assertNotEmpty($response, "Test: MeContact");
        }
    }

    public function testPaymentTerm()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\PaymentTerm");
        $response = $this->application->PaymentTerm()->get([]);

        $this->assertNotEmpty($response, "Test: PaymentTerm");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Payment Term $randomCode",
                "Method" => "Number of days"
            ];

            $response = $this->application->PaymentTerm()->create($params);

            $this->assertNotEmpty($response, "Test: PaymentTerm");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Payment Term $randomCode",
                "Method" => "Number of days"
            ];

            $response = $this->application->PaymentTerm()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->PaymentTerm()->update($id, $params);

            $this->assertNotEmpty($response, "Test: PaymentTerm");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Payment Term $randomCode",
                "Method" => "Number of days"
            ];

            $response = $this->application->PaymentTerm()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->PaymentTerm()->delete($id, []);

            $this->assertNotEmpty($response, "Test: PaymentTerm");
        }
    }

    public function testUnitOfMeasure()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\UnitOfMeasure");
        $response = $this->application->UnitOfMeasure()->get([]);

        $this->assertNotEmpty($response, "Test: UnitOfMeasure");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Unit of Measure $randomCode",
            ];

            $response = $this->application->UnitOfMeasure()->create($params);

            $this->assertNotEmpty($response, "Test: UnitOfMeasure");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Unit of Measure $randomCode",
            ];

            $response = $this->application->UnitOfMeasure()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->UnitOfMeasure()->update($id, $params);

            $this->assertNotEmpty($response, "Test: UnitOfMeasure");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Unit of Measure $randomCode",
            ];

            $response = $this->application->UnitOfMeasure()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->UnitOfMeasure()->delete($id, []);

            $this->assertNotEmpty($response, "Test: UnitOfMeasure");
        }
    }

    public function testTax()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\Tax");
        $response = $this->application->Tax()->get([]);

        $this->assertNotEmpty($response, "Test: Tax");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Test Tax $randomCode",
                "Account" => "2000",
                "IsActive" => true,
                "TaxInclusive" => false,
                "IsTaxForSale" => true,
                "IsTaxForPurchase" => false,
                "Components" => [
                    [
                        "Name" => "Tax 1st $randomCode",
                        "Percent" => "10.0000000000",
                        "AccountCode" => "2000",
                        "Compound" => false,
                        "ComponentOrder" => 1
                    ]
                ]
            ];

            $response = $this->application->Tax()->create($params);

            $this->assertNotEmpty($response, "Test: Tax");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Test Tax $randomCode",
                "Account" => "2000",
                "IsActive" => true,
                "TaxInclusive" => false,
                "IsTaxForSale" => true,
                "IsTaxForPurchase" => false,
                "Components" => [
                    [
                        "Name" => "Tax 1st $randomCode",
                        "Percent" => "10.0000000000",
                        "AccountCode" => "2000",
                        "Compound" => false,
                        "ComponentOrder" => 1
                    ]
                ]
            ];

            $response = $this->application->Tax()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Tax()->update($id, $params);

            $this->assertNotEmpty($response, "Test: Tax");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Test Tax $randomCode",
                "Account" => "2000",
                "IsActive" => true,
                "TaxInclusive" => false,
                "IsTaxForSale" => true,
                "IsTaxForPurchase" => false,
                "Components" => [
                    [
                        "Name" => "Tax 1st $randomCode",
                        "Percent" => "10.0000000000",
                        "AccountCode" => "2000",
                        "Compound" => false,
                        "ComponentOrder" => 1
                    ]
                ]
            ];

            $response = $this->application->Tax()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Tax()->delete($id, []);

            $this->assertNotEmpty($response, "Test: Tax");
        }
    }

    public function testProductAvailability()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\ProductAvailability");
        $response = $this->application->ProductAvailability()->get([]);

        $this->assertNotEmpty($response, "Test: ProductAvailability");
    }

    public function testProductCategory()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\ProductCategory");
        $response = $this->application->ProductCategory()->get([]);

        $this->assertNotEmpty($response, "Test: ProductCategory");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Category $randomCode"
            ];

            $response = $this->application->ProductCategory()->create($params);

            $this->assertNotEmpty($response, "Test: ProductCategory");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Category $randomCode"
            ];

            $response = $this->application->ProductCategory()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->ProductCategory()->update($id, $params);

            $this->assertNotEmpty($response, "Test: ProductCategory");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Name" => "Category $randomCode"
            ];

            $response = $this->application->ProductCategory()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->ProductCategory()->delete($id, []);

            $this->assertNotEmpty($response, "Test: ProductCategory");
        }
    }

    public function testSupplier()
    {
        $reflection = new ReflectionClass("\UmiMood\Dear\Api\Supplier");
        $response = $this->application->Supplier()->get([]);

        $this->assertNotEmpty($response, "Test: Supplier");

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PostMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Status" => "Active",
                "Name" => "Test Supplier $randomCode",
                "PaymentTerm" => "30 days",
                "AccountPayable" => "2000",
                "PriceTier" => "Tier 1",
                "Currency" => "AUD",
                "TaxRule" => "Auto Look Up",

            ];

            $response = $this->application->Supplier()->create($params);

            $this->assertNotEmpty($response, "Test: Supplier");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\PutMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Status" => "Active",
                "Name" => "Test Supplier $randomCode",
                "PaymentTerm" => "30 days",
                "AccountPayable" => "2000",
                "PriceTier" => "Tier 1",
                "Currency" => "AUD",
                "TaxRule" => "Auto Look Up",

            ];

            $response = $this->application->Supplier()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Supplier()->update($id, $params);

            $this->assertNotEmpty($response, "Test: Supplier");
        }

        if ($reflection->implementsInterface("\UmiMood\Dear\Api\Contracts\DeleteMethodAllowed")) {
            $randomCode = $this->getRandomCode();
            $params = [
                "Status" => "Active",
                "Name" => "Test Supplier $randomCode",
                "PaymentTerm" => "30 days",
                "AccountPayable" => "2000",
                "PriceTier" => "Tier 1",
                "Currency" => "AUD",
                "TaxRule" => "Auto Look Up",

            ];

            $response = $this->application->Supplier()->create($params);

            $id = $this->getId($response, __FUNCTION__);
            $response = $this->application->Supplier()->delete($id, []);

            $this->assertNotEmpty($response, "Test: Supplier");
        }
    }

    public function testAdvancedPurchase()
    {
        $parameters = $this->createPurchase();
        $response = $this->application->advancedPurchase()->create($parameters);

        $this->assertArrayHasKey('ID', $response);

        $response = $this->application->advancedPurchase()->find($response['ID']);
        $this->assertArrayHasKey('ID', $response);


        $response = $this->application->advancedPurchase()->delete($response['ID']);
        $this->assertArrayHasKey('ID', $response);
    }

    public function testPurchase()
    {
        $parameters = $this->createPurchase();
        $response = $this->application->purchase()->create($parameters);

        $this->assertArrayHasKey('ID', $response);

        $response = $this->application->purchase()->find($response['ID']);
        $this->assertArrayHasKey('ID', $response);


        $response = $this->application->purchase()->delete($response['ID']);
        $this->assertArrayHasKey('ID', $response);
    }

    protected function createPurchase()
    {
        $randomCode = $this->getRandomCode();
        return [
            "SupplierID" => "8946ca8f-0bf2-483b-88fc-70923d8bdd28",
            "Location" => "Main Warehouse",
            "CurrencyRate" => "1",
            "Approach" => "STOCK"
        ];
    }

    public function testSale()
    {
        $parameters = $this->createSale();
        $response = $this->application->sale()->create($parameters);

        $this->assertArrayHasKey('ID', $response);

        $response = $this->application->sale()->find($response['ID']);
        $this->assertArrayHasKey('ID', $response);


        $response = $this->application->sale()->delete($response['ID']);
        $this->assertArrayHasKey('ID', $response);
    }

    protected function createSale()
    {
        $randomCode = $this->getRandomCode();
        return [
            "CustomerID" => "53f8767f-c0ae-4346-9d4f-35103974d89e",
            "Location" => "Main Warehouse",
            "CurrencyRate" => "1"
        ];
    }

    public function testProductGet()
    {
        $data = $this->application->productFamily()->get([]);
        $this->assertArrayHasKey('ProductFamilies', $data);

        $data = $this->application->product()->get([]);
        $this->assertArrayHasKey('Products', $data);
    }

    public function testProductPost()
    {
        $parameters = $this->createProduct();
        $productResponse = $this->application->product()->create($parameters);

        $this->assertNotEmpty($productResponse['Products']);

        // Product family
        $parameters = $this->createProductFamily();
        $parameters['Products'] = [];
        $parameters['Products'][] = [
            'ID' => $productResponse['Products'][0]['ID'],
            'SKU' => $productResponse['Products'][0]['SKU'],
            'Name' => $productResponse['Products'][0]['Name'],
            'Option1' => '1',
        ];

        $response = $this->application->productFamily()->create($parameters);

        $this->assertNotEmpty($response['ProductFamilies']);
    }

    public function testProductPut()
    {
        $parameters = $this->createProduct();
        $response = $this->application->product()->create($parameters);

        $parameters['Name'] = 'Update Test Product';
        $id = $response['Products'][0]['ID'];
        $response = $this->application->product()->update($id, $parameters);

        $this->assertEquals('Update Test Product', $response['Products'][0]['Name']);
    }

    protected function createProduct()
    {
        $randomCode = $this->getRandomCode();
        return [
            "SKU" => $randomCode,
            "Status" => "Active",
            "Name" => "Test Product Family $randomCode",
            "Category" => "Gloves",
            "Brand" => null,
            "Type" => "Stock",
            "CostingMethod" => "FIFO",
            "DefaultLocation" => "Main Warehouse",
            "UOM" => "Item",
            "Option1Name" => "Option 1",
            "PriceTier1" => 140.0000,
        ];
    }

    protected function createProductFamily()
    {
        $randomCode = $this->getRandomCode();
        return [
            "SKU" => $randomCode,
            "Status" => "Active",
            "Name" => "Test Product Family $randomCode",
            "Category" => "Gloves",
            "Brand" => null,
            "Type" => "Stock",
            "CostingMethod" => "FIFO",
            "DefaultLocation" => "Main Warehouse",
            "UOM" => "Item",
            "Option1Name" => "Option 1",
            "PriceTier1" => 140.0000,
        ];
    }
}