<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\AccessContextManager;

class ReplaceAccessLevelsRequest extends \Google\Collection
{
  protected $collection_key = 'accessLevels';
  /**
   * @var AccessLevel[]
   */
  public $accessLevels;
  protected $accessLevelsType = AccessLevel::class;
  protected $accessLevelsDataType = 'array';
  /**
   * @var string
   */
  public $etag;

  /**
   * @param AccessLevel[]
   */
  public function setAccessLevels($accessLevels)
  {
    $this->accessLevels = $accessLevels;
  }
  /**
   * @return AccessLevel[]
   */
  public function getAccessLevels()
  {
    return $this->accessLevels;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReplaceAccessLevelsRequest::class, 'Google_Service_AccessContextManager_ReplaceAccessLevelsRequest');
