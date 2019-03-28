<?php
// This file was auto-generated from sdk-root/src/data/metering.marketplace/2016-01-14/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'uid' => 'meteringmarketplace-2016-01-14', 'apiVersion' => '2016-01-14', 'endpointPrefix' => 'metering.marketplace', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceFullName' => 'AWSMarketplace Metering', 'signatureVersion' => 'v4', 'signingName' => 'aws-marketplace', 'targetPrefix' => 'AWSMPMeteringService', ], 'operations' => [ 'BatchMeterUsage' => [ 'name' => 'BatchMeterUsage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'BatchMeterUsageRequest', ], 'output' => [ 'shape' => 'BatchMeterUsageResult', ], 'errors' => [ [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidProductCodeException', ], [ 'shape' => 'InvalidUsageDimensionException', ], [ 'shape' => 'InvalidCustomerIdentifierException', ], [ 'shape' => 'TimestampOutOfBoundsException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'MeterUsage' => [ 'name' => 'MeterUsage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'MeterUsageRequest', ], 'output' => [ 'shape' => 'MeterUsageResult', ], 'errors' => [ [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidProductCodeException', ], [ 'shape' => 'InvalidUsageDimensionException', ], [ 'shape' => 'InvalidEndpointRegionException', ], [ 'shape' => 'TimestampOutOfBoundsException', ], [ 'shape' => 'DuplicateRequestException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ResolveCustomer' => [ 'name' => 'ResolveCustomer', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ResolveCustomerRequest', ], 'output' => [ 'shape' => 'ResolveCustomerResult', ], 'errors' => [ [ 'shape' => 'InvalidTokenException', ], [ 'shape' => 'ExpiredTokenException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], ], 'shapes' => [ 'BatchMeterUsageRequest' => [ 'type' => 'structure', 'required' => [ 'UsageRecords', 'ProductCode', ], 'members' => [ 'UsageRecords' => [ 'shape' => 'UsageRecordList', ], 'ProductCode' => [ 'shape' => 'ProductCode', ], ], ], 'BatchMeterUsageResult' => [ 'type' => 'structure', 'members' => [ 'Results' => [ 'shape' => 'UsageRecordResultList', ], 'UnprocessedRecords' => [ 'shape' => 'UsageRecordList', ], ], ], 'Boolean' => [ 'type' => 'boolean', ], 'CustomerIdentifier' => [ 'type' => 'string', 'max' => 255, 'min' => 1, ], 'DuplicateRequestException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'ExpiredTokenException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'InternalServiceErrorException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, 'fault' => true, ], 'InvalidCustomerIdentifierException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'InvalidEndpointRegionException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'InvalidProductCodeException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'InvalidTokenException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'InvalidUsageDimensionException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'MeterUsageRequest' => [ 'type' => 'structure', 'required' => [ 'ProductCode', 'Timestamp', 'UsageDimension', 'UsageQuantity', 'DryRun', ], 'members' => [ 'ProductCode' => [ 'shape' => 'ProductCode', ], 'Timestamp' => [ 'shape' => 'Timestamp', ], 'UsageDimension' => [ 'shape' => 'UsageDimension', ], 'UsageQuantity' => [ 'shape' => 'UsageQuantity', ], 'DryRun' => [ 'shape' => 'Boolean', ], ], ], 'MeterUsageResult' => [ 'type' => 'structure', 'members' => [ 'MeteringRecordId' => [ 'shape' => 'String', ], ], ], 'NonEmptyString' => [ 'type' => 'string', 'pattern' => '\\S+', ], 'ProductCode' => [ 'type' => 'string', 'max' => 255, 'min' => 1, ], 'ResolveCustomerRequest' => [ 'type' => 'structure', 'required' => [ 'RegistrationToken', ], 'members' => [ 'RegistrationToken' => [ 'shape' => 'NonEmptyString', ], ], ], 'ResolveCustomerResult' => [ 'type' => 'structure', 'members' => [ 'CustomerIdentifier' => [ 'shape' => 'CustomerIdentifier', ], 'ProductCode' => [ 'shape' => 'ProductCode', ], ], ], 'String' => [ 'type' => 'string', ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'Timestamp' => [ 'type' => 'timestamp', ], 'TimestampOutOfBoundsException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'UsageDimension' => [ 'type' => 'string', 'max' => 255, 'min' => 1, ], 'UsageQuantity' => [ 'type' => 'integer', 'max' => 1000000, 'min' => 0, ], 'UsageRecord' => [ 'type' => 'structure', 'required' => [ 'Timestamp', 'CustomerIdentifier', 'Dimension', 'Quantity', ], 'members' => [ 'Timestamp' => [ 'shape' => 'Timestamp', ], 'CustomerIdentifier' => [ 'shape' => 'CustomerIdentifier', ], 'Dimension' => [ 'shape' => 'UsageDimension', ], 'Quantity' => [ 'shape' => 'UsageQuantity', ], ], ], 'UsageRecordList' => [ 'type' => 'list', 'member' => [ 'shape' => 'UsageRecord', ], 'max' => 25, 'min' => 0, ], 'UsageRecordResult' => [ 'type' => 'structure', 'members' => [ 'UsageRecord' => [ 'shape' => 'UsageRecord', ], 'MeteringRecordId' => [ 'shape' => 'String', ], 'Status' => [ 'shape' => 'UsageRecordResultStatus', ], ], ], 'UsageRecordResultList' => [ 'type' => 'list', 'member' => [ 'shape' => 'UsageRecordResult', ], ], 'UsageRecordResultStatus' => [ 'type' => 'string', 'enum' => [ 'Success', 'CustomerNotSubscribed', 'DuplicateRecord', ], ], 'errorMessage' => [ 'type' => 'string', ], ],];
